<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentNotification;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\Address;
use App\Models\MeetUpLocation;
use App\Models\Transaction;
use App\Models\Invoice;
use App\Events\TransactionCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Validator;
use App\Models\InvoiceNotification;

class OrderController extends Controller
{
    public function checkout()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->latest()->get();

           // Retrieve mineItems from the session
        $mineItems = session()->get('mine_items', []);
    
        return view('ToPay', compact('orders', 'mineItems'));
    }
 
    public function mine($productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->is_sold) {
            return redirect()->back()->with('error', 'This product is already sold.');
        }

        
        $mineItems = [
            $productId => [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1, // Always 1 for second-hand store
                'image' => $product->image,
            ]
        ];

        session()->put('mine_items', $mineItems); // Overwrites previous session data

        return redirect()->route('order.topay')->with('success', 'Product added to Mine list!');
    }


    public function toPay()
    {
        $user = auth()->user();
        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();
        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->with('orderItems.product')
            ->get();

        // Retrieve mineItems from session
        $mineItems = session()->get('mine_items', []);

        $defaultAddress = auth()->user()->addresses()->where('is_default', true)->first();
        $locations = MeetUpLocation::all()->map(function ($loc) {
            return [
                'id' => $loc->id,
                'city' => $loc->city,
                'landmark' => $loc->landmark,
            ];
        })->groupBy('city');

         // Shipping fee calculation based on city
        $shippingFees = [
            'Barcelona' => 20,
            'Bulan' => 75,
            'Bulusan' => 50,
            'Castilla' => 30,
            'Donsol' => 60,
            'Irosin' => 60,
            'Juban' => 25,
            'Magallanes' => 80,
            'Matnog' => 70,
            'Pilar' => 35,
            'Prieto Diaz' => 20,
        ];

    $city = $defaultAddress ? $defaultAddress->city : '';  // Ensure city exists

    // Get shipping fee based on the city
    $shippingFee = $shippingFees[$city] ?? 0;  // Default to 0 if the city isn't found in the array

    $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

    $notifCount = InvoiceNotification::where('user_id', $user->id)->count();

        return view('topay', compact('orders', 'mineItems', 'defaultAddress', 'locations', 'shippingFee', 'city', 'cartCount', 'notifications', 'notifCount'));
    }


public function placeOrder(Request $request)
{
    $user = auth()->user();

    $cartCount = CartItem::where('user_id', $user->id)->count();

    $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

    $notifCount = InvoiceNotification::where('user_id', $user->id)->count();

    // Validate request data
    $request->validate([
        'payment_method' => 'required|string',
        'delivery_method' => 'required|in:shipping,meetup,pickup',
        'meetup_location_id' => 'nullable|exists:meet_up_locations,id'
    ]);

    $mineItems = session()->get('mine_items', []);
    if (empty($mineItems)) {
        return redirect()->back()->with('error', 'No items selected for order.');
    }

    $totalAmount = collect($mineItems)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    $defaultAddress = $user->addresses()->where('is_default', true)->first();

    // Shipping fee calculation based on city — only apply if delivery method is shipping
    $shippingFee = 0;

    if ($request->input('delivery_method') === 'shipping') {
        $shippingFees = [
            'Barcelona' => 20,
            'Bulan' => 75,
            'Bulusan' => 50,
            'Castilla' => 30,
            'Donsol' => 60,
            'Irosin' => 60,
            'Juban' => 25,
            'Magallanes' => 80,
            'Matnog' => 70,
            'Pilar' => 35,
            'Prieto Diaz' => 20,
        ];

        $city = $defaultAddress ? $defaultAddress->city : '';
        $shippingFee = $shippingFees[$city] ?? 0;
    }

    // Get or create delivery method
    $deliveryMethod = DeliveryMethod::firstOrCreate([
        'name' => $request->input('delivery_method')
    ]);

    if ($request->payment_method === 'cod') {
        // Handle COD normally
        $paymentMethod = PaymentMethod::firstOrCreate([
            'name' => 'cod'
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'payment_method_id' => $paymentMethod->id,
            'delivery_method_id' => $deliveryMethod->id,
            'shipping_address_id' => $request->delivery_method === 'shipping' ? optional($defaultAddress)->id : null,
            'meetup_location_id' => $request->delivery_method === 'meetup' ? $request->input('meetup_location_id') : null,
            'total_price' => $totalAmount + $shippingFee,
            'status' => 'pending'
        ]);

        foreach ($mineItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
            Product::where('id', $item['product_id'])->update(['is_sold' => true]);
        }

        // Add user to customers table if not already present
        $this->addUserToCustomersTable($user);

        session()->forget('mine_items');

        return redirect()->route('Clothing')->with('order_success', 'Order placed successfully! (COD)');
    } else {
        session([
            'delivery_method' => $request->input('delivery_method'),
            'shipping_address_id' => optional($user->addresses()->where('is_default', true)->first())->id,
            'meetup_location_id' => $request->input('meetup_location_id'),
            'payment_method' => $request->input('payment_method')
        ]);

        // Include shipping fee in amount if delivery method is shipping
        if ($request->input('delivery_method') === 'shipping') {
            $totalAmount += $shippingFee;
        }
        // For PayMongo — just pass session data
        $request->merge(['amount' => $totalAmount]); // No shipping fee for pickup/meetup
        return app(PaymentController::class)->createPaymentIntent($request);
    }
}


//Added By Karilaaa
//Start ng changes
    // Get order details
    public function getOrderDetails($id)
    {
        $order = Order::with(['user', 'orderItems.product', 'paymentMethod', 'deliveryMethod', 'meetupLocation'])->findOrFail($id);

        // Determine the delivery location based on the delivery method
        $deliveryLocation = 'N/A';
        if ($order->deliveryMethod->name === 'shipping') {
            //$deliveryLocation = $order->shippingAddress ?? 'N/A'; // Use the shipping address from the order
            $deliveryLocation = $order->shippingAddress
                ? $order->shippingAddress->street . ', ' . 
                $order->shippingAddress->barangay . ', ' .
                $order->shippingAddress->city . ', ' .
                $order->shippingAddress->province . ', ' .
                $order->shippingAddress->region . ', ' . 
                $order->shippingAddress->zip_code
                : 'N/A'; // Combine address fields from the shipping_address table
        } elseif ($order->deliveryMethod->name === 'meetup') {
            $deliveryLocation = $order->meetupLocation
                ? $order->meetupLocation->city . ', ' . $order->meetupLocation->landmark
                : 'N/A'; // Combine city and landmark from the meetup_location table
        } elseif ($order->deliveryMethod->name === 'pickup') {
            $deliveryLocation = 'Central 2, Abuyog, Sorsogon City'; // Fixed store address
        }
 
        $shippingFees = [
            'Barcelona' => 20,
            'Bulan' => 75,
            'Bulusan' => 50,
            'Castilla' => 30,
            'Donsol' => 60,
            'Irosin' => 60,
            'Juban' => 25,
            'Magallanes' => 80,
            'Matnog' => 70,
            'Pilar' => 35,
            'Prieto Diaz' => 20,
        ];
        
        $deliveryFee = 0;
        
        $deliveryMethod = $order->deliveryMethod->name;
        
        if ($deliveryMethod === 'shipping' && $order->shippingAddress) {
            $city = $order->shippingAddress->city;
            $deliveryFee = $shippingFees[$city] ?? 0;
        }

        return response()->json([
            'id' => $order->id,
            'customer_name' => $order->user->fullname,
            'order_date' => $order->created_at->format('F d, Y'),
            'payment_method' => $order->paymentMethod -> name ?? 'N/A',
            'delivery_method' => $order->deliveryMethod -> name ?? 'N/A',
            //'delivery_location' => $order->meetupLocation ? $order->meetupLocation->city . ', ' . $order->meetupLocation->landmark : 'N/A', // Combine city and landmark
            'delivery_location' => $deliveryLocation,
            //'subtotal' => $order->subtotal,
            'delivery_fee' => $order->delivery_fee,
            'total' => $order->total_amount,
            'items' => $order->orderItems->map(function ($item) {
                return [
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'image' => asset($item->product->image ?? 'assets/img/default.png'),
                ];
            }),
        ]);
        
    }

    // Generate invoice
    public function generateInvoice(Request $request)
    {
        $orderId = $request->query('order_id'); // Get the order_id from the query parameter
        $order = Order::with(['user', 'orderItems.product', 'paymentMethod', 'deliveryMethod', 'meetupLocation'])->findOrFail($orderId);

        // Pass the order details to the view
        return view('admin.generateInvoice', compact('order'));
    }

    public function storeInvoice(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required|date_format:H:i',
        ]);

        // Check if an invoice already exists for this order
        $existingInvoice = Invoice::where('order_id', $validated['order_id'])->first();

        if ($existingInvoice) {
            return redirect()->back()->with('info', 'Invoice already exists for this order.');
        }

        // Generate a unique invoice number
        $invoiceNumber = 'INV-' . strtoupper(uniqid());

        // Store the invoice in the database
        $invoice = Invoice::create([
            'order_id' => $validated['order_id'],
            'delivery_date' => $validated['delivery_date'],
            'delivery_time' => $validated['delivery_time'],
            'invoice_number' => $invoiceNumber,
        ]);

        //Auto fill the transaction table once the Generate Invoice button is clicked
        // Fetch the order details
        $order = Order::with(['paymentMethod', 'deliveryMethod'])->findOrFail($validated['order_id']);

        //Check if a transaction already exists for this order
        $existingTransaction = Transaction::where('order_id', $order->id)->first();

        if (!$existingTransaction) {
            // No existing transaction found, so create a new one
            $transaction = Transaction::create([
                'order_id' => $validated['order_id'],
                'transaction_id' => 'TXN-' . strtoupper(uniqid()),
                'payment_method' => $order->paymentMethod->name ?? 'N/A',
                'amount' => $order->total_price, // Total amount from the order
                'status' => 'Pending', // Default status
            ]);
            
                //Trigger the TransactionCreated event
                event(new TransactionCreated($transaction));
        } else {
            // Optional: log or alert that a transaction already exists
            // You can flash a message or just silently skip
            session()->flash('info', 'Transaction already exists for this order.');
        }

        
        // Update the order status to "Processing"
        $order->status = 'processing';
        $order->save();


        // Redirect to the showInvoice route with the invoice ID
        return redirect()->route('show.invoice', ['id' => $invoice->id])
            ->with('success', 'Invoice generated, transaction created, and order status updated.');
    }

    public function showInvoice($id)
    {
        // Fetch the invoice and related order details
        $invoice = Invoice::findOrFail($id);
        $order = Order::with(['user', 'orderItems.product', 'paymentMethod', 'deliveryMethod', 'meetupLocation'])
            ->findOrFail($invoice->order_id);

        // Return the ViewInvoice Blade with the invoice and order details
        return view('admin.ViewInvoice', compact('invoice', 'order'));
    }



    public function clientInvoice($id)
{
    $user = auth()->user();

    // Fetch the notification using the ID
    $notif = InvoiceNotification::findOrFail($id);

    // Retrieve the order associated with the notification
    $order = Order::with(['user', 'orderItems.product', 'paymentMethod', 'deliveryMethod', 'meetupLocation'])
        ->findOrFail($notif->order_id);

    // Retrieve the corresponding invoice for the order
    $invoice = Invoice::where('order_id', $notif->order_id)->firstOrFail();
    $cartCount = CartItem::where('user_id', $user->id)->count();
    $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

    $notifCount = InvoiceNotification::where('user_id', $user->id)->count();

    $shippingFees = [
        'Barcelona' => 20,
        'Bulan' => 75,
        'Bulusan' => 50,
        'Castilla' => 30,
        'Donsol' => 60,
        'Irosin' => 60,
        'Juban' => 25,
        'Magallanes' => 80,
        'Matnog' => 70,
        'Pilar' => 35,
        'Prieto Diaz' => 20,
    ];
    
    $deliveryFee = 0;
    
    $deliveryMethod = $order->deliveryMethod->name;
    
    if ($deliveryMethod === 'shipping' && $order->shippingAddress) {
        $city = $order->shippingAddress->city;
        $deliveryFee = $shippingFees[$city] ?? 0;
    }
    // For 'meetup' or 'pickup', deliveryFee remains 0
    

    

    // Return the ViewInvoice Blade with the invoice and order details
    return view('E-Invoice', compact('invoice', 'order', 'cartCount', 'notifications', 'notifCount','user','deliveryFee', 'deliveryMethod', 'shippingFees'));
}





    public function confirmPayment($transactionId)
    {
        $transaction = Transaction::where('transaction_id', $transactionId)->firstOrFail();
        $transaction->status = 'paid';
        $transaction->save();

        // Mark the related notification as read
        $notification = DatabaseNotification::where('data->transaction_id', $transactionId)
        //->where('notifiable_id', auth()->id()) // Ensures it's the current admin
        ->first();

    if ($notification) {
        \Log::info('Notification found and marked as read', ['notification_id' => $notification->id]);
        $notification->markAsRead();
    } else {
        \Log::info('Notification not found');
    }

        return response()->json(['success' => true, 'message' => 'Payment confirmed.']);
    }










protected function addUserToCustomersTable($user)
{
    // Check if the user already exists in the customers table
    $customerExists = Customer::where('user_id', $user->id)->exists();

    if (!$customerExists) {
        $cleanFullname = preg_replace('/\s+/', ' ', trim($user->fullname)); // clean extra spaces
        $nameParts = explode(' ', $cleanFullname);

        // First name is everything up to the last space (if second name exists)
        $firstName = implode(' ', array_slice($nameParts, 0, -1));

        // Last name is the part after the last space
        $lastName = array_pop($nameParts);


        // Create a new customer record
            Customer::create([
            'user_id' => $user->id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            // Optionally, populate other fields like phone number, address, etc.
            // These fields can be updated later via a profile update form.
        ]);
    }
}


public function showCompletedOrders()
{
    $user = auth()->user();

    // Fetch pending orders
    $pendingOrders = Order::where('user_id', $user->id)
    ->where('status', 'pending')
    ->with(['orderItems.product', 'paymentMethod', 'deliveryMethod'])
    ->get();


    // Fetch processing orders
    $processingOrders = Order::where('user_id', $user->id)
        ->where('status', 'processing')
        ->with('orderItems.product')
        ->get();
    
    // Fetch completed orders
    $completedOrders = Order::where('user_id', Auth::id())
        ->where('status', 'completed')
        ->whereDoesntHave('review') // Exclude orders that already have reviews
        ->with('orderItems.product') // Eager load order items and their associated products
        ->get();

    // Fetch cancelled orders
    $cancelledOrders = Order::where('user_id', $user->id)
    ->where('status', 'cancelled')
    ->with(['orderItems.product', 'paymentMethod', 'deliveryMethod'])
    ->get();


    //for address display
    $addresses = $user->addresses;
    // Get updated cart count
    $cartCount = CartItem::where('user_id', $user->id)->count();
    $defaultAddress = $addresses->where('is_default', 1)->first();
    $phoneNumber = $defaultAddress ? $defaultAddress->phone_number : 'N/A';

    $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

    $notifCount = InvoiceNotification::where('user_id', $user->id)->count();

    
    return view('UserProfile', compact('completedOrders', 'addresses', 'user','processingOrders', 'pendingOrders', 'cancelledOrders', 'cartCount','defaultAddress', 'phoneNumber','notifications', 'notifCount'));
}



public function markAsCompleted(Order $order)
{
    // Optional: Authorization check
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    // Update status
    $order->update(['status' => 'completed']);

    return redirect()->back()->with('success', 'Order status updated to completed.');
}

public function cancel(Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    $order->update(['status' => 'cancelled']);

    return redirect()->back()->with('success', 'Order cancelled successfully.');
}

public function updateProfile(Request $request)
{
    $user = Auth::user()->load('defaultAddress');

    $validator = Validator::make($request->all(), [
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'gender' => 'nullable|in:Male,Female,Other',
        'day' => 'nullable|integer|between:1,31',
        'month' => 'nullable|integer|between:1,12',
        'year' => 'nullable|integer|between:1900,' . date('Y'),
        'phone_number' => 'nullable|string|max:15',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update User
    $user->fullname = $request->input('fullname');
    $user->email = $request->input('email');
    $user->gender = $request->input('gender');

    // Update DOB
    if ($request->filled('day') && $request->filled('month') && $request->filled('year')) {
        $user->birthdate = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
    }

    $user->save();

    // Update Default Address
    if ($user->defaultAddress) {
        $user->defaultAddress->phone_number = $request->input('phone_number');
        $user->defaultAddress->save();
    }

    return redirect()->back()->with('updated_profile', 'Profile updated successfully.');
}




}