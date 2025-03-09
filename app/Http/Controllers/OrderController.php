<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->latest()->get();
    
        return view('ToPay', compact('orders'));
    }

    public function mine(Request $request)
{
    // Retrieve authenticated user
    $user = auth()->user();

    // Check if user has an existing "To Pay" order
    $order = Order::where('user_id', $user->id)
        ->where('status', 'Pending')
        ->first();

    // If no existing order, create a new one
    if (!$order) {
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => 0, // Will be updated after adding items
            'status' => 'Pending', // Set status to "To Pay"
        ]);
    }

    // Add item to order
    $orderItem = OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $request->product_id,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);

    // Update total price
    $order->total_price += $orderItem->price * $orderItem->quantity;
    $order->save();

    // Redirect to "ToPay" page
    return redirect()->route('order.topay');
}

public function toPay()
{
    $user = auth()->user();
    $orders = Order::where('user_id', $user->id)
        ->where('status', 'Pending')
        ->with('orderItems.product')
        ->get();

    return view('topay', compact('orders'));
}


}
