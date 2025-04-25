<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\CartItem;
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
        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->with('orderItems.product')
            ->get();

        // Retrieve mineItems from session
        $mineItems = session()->get('mine_items', []);

        return view('topay', compact('orders', 'mineItems'));
    }

    public function placeOrder(Request $request)
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

        // Retrieve mineItems from session
        $mineItems = session()->get('mine_items', []);

        if (empty($mineItems)) {
            return redirect()->back()->with('error', 'No items selected for order.');
        }

        // Calculate total price from session data
        $totalAmount = collect($mineItems)->sum(function ($item) {
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
        foreach ($mineItems as $item) {
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
        session()->forget('mine_items');

        // Handle payment redirection
        if ($request->payment_method === 'cod') {
            return redirect()->route('orders.pending')->with('success', 'Order placed successfully! (COD)');
        } else {
            return app(PaymentController::class)->createPaymentIntent($request);
        }
    }


}