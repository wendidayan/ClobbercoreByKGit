<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Auth;

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
            'Barcelona' => 50,
            'Bulan' => 120,
            'Bulusan' => 80,
            'Casiguran' => 70,
            'Castilla' => 60,
            'Donsol' => 110,
            'Gubat' => 40,
            'Irosin' => 90,
            'Juban' => 55,
            'Magallanes' => 130,
            'Matnog' => 100,
            'Pilar' => 65,
            'Prieto Diaz' => 50,
        ];

    $city = $defaultAddress ? $defaultAddress->city : '';  // Ensure city exists

    // Get shipping fee based on the city
    $shippingFee = $shippingFees[$city] ?? 0;  // Default to 0 if the city isn't found in the array

        return view('topay', compact('orders', 'mineItems', 'defaultAddress', 'locations', 'shippingFee', 'city', 'cartCount'));
    }


public function placeOrder(Request $request)
{
    $user = auth()->user();

    $cartCount = CartItem::where('user_id', $user->id)->count();

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
            'meetup_location_id' => $request->input('meetup_location_id')
        ]);

        // For PayMongo — just pass session data
        $request->merge(['amount' => $totalAmount]); // No shipping fee for pickup/meetup
        return app(PaymentController::class)->createPaymentIntent($request);
    }
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

    return view('UserProfile', compact('completedOrders', 'addresses', 'user','processingOrders', 'pendingOrders', 'cancelledOrders', 'cartCount'));
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



}