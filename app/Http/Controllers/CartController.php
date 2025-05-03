<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\DeliveryMethod;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Customer;
use App\Models\Address;
use App\Models\MeetUpLocation;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        if ($product->is_sold) {
            return redirect()->route('cart.view')->with('error', 'This product has already been sold.');
        }

        // Check if the product is already in the cart
        $existingCartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            return response()->json(['already_in_cart' => true]);
        }

        // Add product to cart
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price, // Store price at the time of adding
        ]);

        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();

        return response()->json(['cart_added' => true, 'cartCount' => $cartCount]);
    }

    public function viewCart()
    {
        $user = Auth::user();
        $cartCount = CartItem::where('user_id', $user->id)->count();
        
        // Find all sold products in the user's cart
        $soldItems = CartItem::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('is_sold', true);
            })
            ->get();

        // Delete sold items from the cart
        foreach ($soldItems as $item) {
            $item->delete();
        }

        // Fetch remaining cart items (only unsold products)
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('PlaceOrder', compact('cartItems','cartCount', 'user'));
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = CartItem::where('id', $cartItemId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()->with('cart_deleted', true);
    }


    //place order from cart working and saving in database

    public function checkoutCart()
    {
    $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->latest()->get();

    // Retrieve cart items from the session
    $cartItems = session()->get('cart_items', []);

    return view('ToPayCart', compact('orders', 'cartItems')); 
    }


    public function cartPlaceOrder(Request $request)
    {
        $selectedCartItems = $request->input('cart_items', []);
    
        if (empty($selectedCartItems)) {
            return redirect()->back()->with('error', 'Please select at least one item.');
        }
    
        // Retrieve selected cart items from the database
        $cartItems = CartItem::whereIn('id', $selectedCartItems)
            ->where('user_id', Auth::id())
            ->with('product')
            ->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Selected items not found.');
        }
    
        // Reset session data before storing new selection
        session()->forget('cart_items'); 
    
        // Store new selection
        $newCartData = [];
        foreach ($cartItems as $cartItem) {
            $newCartData[$cartItem->id] = [
                'product_id' => $cartItem->product->id,
                'name' => $cartItem->product->name,
                'price' => $cartItem->price,
                'quantity' => 1, // Default quantity
                'image' => $cartItem->product->image,
            ];
        }
    
        // Save to session
        session()->put('cart_items', $newCartData);
    
        return redirect()->route('order.topaycart')->with('success', 'Selected cart items added for checkout.');
    }

    public function toPayCart()
    {
        $user = auth()->user();
        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();
        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->with('orderItems.product')
            ->get();

        // Retrieve cart items from session
        $cartItems = session()->get('cart_items', []);

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


        return view('ToPayCart', compact('orders', 'cartItems', 'defaultAddress', 'locations','city', 'shippingFee','cartCount'));
    }

    
    public function placeOrderCart(Request $request)
    {
        $user = auth()->user();

        // Validate request
        $request->validate([
            'payment_method' => 'required|string',
            'delivery_method' => 'required|in:shipping,meetup,pickup',
            'meetup_location_id' => 'nullable|exists:meet_up_locations,id'
        ]);
    
        // Retrieve cart items from session
        $cartItems = session()->get('cart_items', []);
    
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'No items selected for order.');
        }
    
        // Calculate total price from session data
        $totalAmount = collect($cartItems)->sum(function ($item) {
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

        // Handle COD: Create order immediately
        if ($request->payment_method === 'cod') {
            $paymentMethod = PaymentMethod::firstOrCreate(['name' => 'cod']);

            
            $defaultAddress = $user->addresses()->where('is_default', true)->first();
    
            $order = Order::create([
                'user_id' => $user->id,
                'payment_method_id' => $paymentMethod->id,
                'delivery_method_id' => $deliveryMethod->id,
                'shipping_address_id' => $request->delivery_method === 'shipping' ? optional($defaultAddress)->id : null,
                'meetup_location_id' => $request->delivery_method === 'meetup' ? $request->input('meetup_location_id') : null,
                'total_price' => $totalAmount + $shippingFee,
                'status' => 'pending'
            ]);
    
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
    
                Product::where('id', $item['product_id'])->update(['is_sold' => true]);
            }
    
            session()->forget('cart_items');
    
            return redirect()->route('Clothing')->with('order_success', 'Order placed successfully! (COD)');
        }
    
        // For online payment: save cart and payment data in session only
        session([
            'payment_data' => [
            'cart_items' => $cartItems,
            'total_amount' => $totalAmount,
            'payment_method' => $request->payment_method,
            'delivery_method' => $request->delivery_method,
            'shipping_address_id' => optional($user->addresses()->where('is_default', true)->first())->id,
            'meetup_location_id' => $request->input('meetup_location_id'),
            ]
        ]);

        $request->merge(['amount' => $totalAmount]); // No shipping fee for pickup/meetup
    
        // Redirect to PaymentController to handle PayMongo payment flow
        return app(PaymentController::class)->createcartPaymentIntent($request);
}
}
