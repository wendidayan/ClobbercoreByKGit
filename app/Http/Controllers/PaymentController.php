<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\OrderItem;
use App\Models\Product;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
{
    $orderTotal = $request->amount;
    $userEmail = auth()->user()->email;

    $response = Http::withHeaders([
        'accept' => 'application/json',
        'content-type' => 'application/json',
        'authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY')),
    ])->post('https://api.paymongo.com/v1/checkout_sessions', [
        'data' => [
            'attributes' => [
                'amount' => $orderTotal * 100, 
                'currency' => 'PHP',
                'description' => 'Order Payment',
                'line_items' => [[
                    'name' => 'Order Payment',
                    'quantity' => 1,
                    'amount' => $orderTotal * 100,
                    'currency' => 'PHP'
                ]],
                'payment_method_types' => ['gcash', 'paymaya'],
                'send_email_receipt' => true,
                'billing' => [
                    'email' => $userEmail,
                ],
                'success_url' => route('payment.success'), // Remove order_id
                'cancel_url' => route('payment.cancel'),
            ]
        ]
    ]);

    $checkoutUrl = $response->json()['data']['attributes']['checkout_url'] ?? null;

    if ($checkoutUrl) {
        return redirect()->away($checkoutUrl);
    }

    return back()->with('error', 'Failed to create payment session.');
}


public function success(Request $request)
{
    $mineItems = session()->get('mine_items', []);
    if (empty($mineItems)) {
        return redirect()->route('order.topay')->with('error', 'No items to process.');
    }

    $user = auth()->user();

    $totalAmount = collect($mineItems)->sum(fn($item) => $item['price']);

    $paymentMethod = PaymentMethod::firstOrCreate([
        'name' => 'gcash' // or 'paymaya' depending on preference
    ]);

    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'total_price' => $totalAmount + 36,
        'status' => 'processing'
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

    return view('payment.success')->with('success', 'Payment was successful and order placed.');
}


public function cancel()
{
    return view('payment.cancel')->with('error', 'Payment was cancelled.');
}


public function createcartPaymentIntent(Request $request)
{
    $paymentData = session('payment_data');
    if (!$paymentData || empty($paymentData['cart_items'])) {
        return back()->with('error', 'No cart items found for payment.');
    }

    $orderTotal = $paymentData['total_amount'];
    $userEmail = auth()->user()->email;

    $response = Http::withHeaders([
        'accept' => 'application/json',
        'content-type' => 'application/json',
        'authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY')),
    ])->post('https://api.paymongo.com/v1/checkout_sessions', [
        'data' => [
            'attributes' => [
                'amount' => $orderTotal * 100,
                'currency' => 'PHP',
                'description' => 'Cart Order Payment',
                'line_items' => [[
                    'name' => 'Cart Order Payment',
                    'quantity' => 1,
                    'amount' => $orderTotal * 100,
                    'currency' => 'PHP'
                ]],
                'payment_method_types' => ['gcash', 'paymaya'],
                'send_email_receipt' => true,
                'billing' => [
                    'email' => $userEmail,
                ],
                'success_url' => route('payment.cart.success'),
                'cancel_url' => route('payment.cancel'),
            ]
        ]
    ]);

    $checkoutUrl = $response->json()['data']['attributes']['checkout_url'] ?? null;

    if ($checkoutUrl) {
        return redirect()->away($checkoutUrl);
    }

    return back()->with('error', 'Failed to create payment session.');
}



public function successCartPayment(Request $request)
{
    $paymentData = session('payment_data');

    if (!$paymentData || empty($paymentData['cart_items'])) {
        return redirect()->route('orders.pending')->with('error', 'No items to process from cart.');
    }

    $cartItems = $paymentData['cart_items'];
    $totalAmount = $paymentData['total_amount'];
    $user = auth()->user();

    $paymentMethod = PaymentMethod::firstOrCreate([
        'name' => $paymentData['payment_method'] ?? 'gcash'
    ]);

    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'total_price' => $totalAmount + 36,
        'status' => 'processing'
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

    session()->forget('payment_data');

    return view('payment.success')->with('success', 'Payment successful! Order has been placed.');
}


}