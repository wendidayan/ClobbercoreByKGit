<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\OrderItem;
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
            return redirect()->back()->with('already_in_cart', true);
        }

        // Add product to cart
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price, // Store price at the time of adding
        ]);

        // Added to cart modal in the blade
        return redirect()->back()->with('cart_added', true);
    }

    public function viewCart()
    {
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

        return view('PlaceOrder', compact('cartItems'));
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
            ];
        }
    
        // Save to session
        session()->put('cart_items', $newCartData);
    
        return redirect()->route('order.topaycart')->with('success', 'Selected cart items added for checkout.');
    }

    public function toPayCart()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->with('orderItems.product')
            ->get();

        // Retrieve cart items from session
        $cartItems = session()->get('cart_items', []);

        return view('ToPayCart', compact('orders', 'cartItems'));
    }

    
    public function placeOrderCart(Request $request)
    {
        $user = auth()->user();

        // Validate request
        $request->validate([
            'payment_method' => 'required|string'
        ]);

        // Find or create the payment method
        $paymentMethod = PaymentMethod::firstOrCreate([
            'name' => $request->payment_method
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

        // Create an order
        $order = Order::create([
            'user_id' => $user->id,
            'payment_method_id' => $paymentMethod->id,
            'total_price' => $totalAmount + 36, // Additional fee included
            'status' => $request->payment_method === 'cod' ? 'pending' : 'processing'
        ]);

        // Save each order item
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            // Mark product as sold
            Product::where('id', $item['product_id'])->update(['is_sold' => true]);
        }

        // Clear the session after order placement
        session()->forget('cart_items');

        // Handle payment redirection
        if ($request->payment_method === 'cod') {
            return redirect()->route('orders.pending')->with('success', 'Order placed successfully! (COD)');
        } else {
            return app(PaymentController::class)->createPaymentIntent($request);
        }
    }
}