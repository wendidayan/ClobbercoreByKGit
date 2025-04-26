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

    $request->validate([
        'payment_method' => 'required|string'
    ]);

    $mineItems = session()->get('mine_items', []);
    if (empty($mineItems)) {
        return redirect()->back()->with('error', 'No items selected for order.');
    }

    $totalAmount = collect($mineItems)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    if ($request->payment_method === 'cod') {
        // Handle COD normally
        $paymentMethod = PaymentMethod::firstOrCreate([
            'name' => 'cod'
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'payment_method_id' => $paymentMethod->id,
            'total_price' => $totalAmount + 36,
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

        session()->forget('mine_items');

        return redirect()->route('orders.pending')->with('success', 'Order placed successfully! (COD)');
    } else {
        // For PayMongo — just pass session data
        $request->merge(['amount' => $totalAmount + 36]);
        return app(PaymentController::class)->createPaymentIntent($request);
    }


    }

    
}