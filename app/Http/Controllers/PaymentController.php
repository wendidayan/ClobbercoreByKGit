<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\DeliveryMethod;

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

/*
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
}*/

public function success(Request $request)
{
    $mineItems = session()->get('mine_items', []);
    if (empty($mineItems)) {
        return redirect()->route('order.topay')->with('error', 'No items to process.');
    }

    $user = auth()->user();

    $totalAmount = collect($mineItems)->sum(fn($item) => $item['price']);

    $deliveryMethodName = session('delivery_method', 'shipping');

    $paymentMethod = PaymentMethod::firstOrCreate([
        'name' => 'gcash' // or 'paymaya' depending on preference
    ]);

    // Get or create delivery method
    $deliveryMethod = DeliveryMethod::firstOrCreate([
        'name' => $deliveryMethodName
    ]);

    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'delivery_method_id' => $deliveryMethod->id,
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

    // Add user to customers table if not already present
    $this->addUserToCustomersTable($user);

    session()->forget('mine_items');

    return redirect()->route('Clothing')->with('order_success', 'Payment successful! Order has been placed.');
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


/*
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
}*/

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

    $deliveryMethod = DeliveryMethod::firstOrCreate([
        'name' => $paymentData['delivery_method']
    ]);
    
    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'delivery_method_id' => $deliveryMethod->id,
        'total_price' => $totalAmount + 36,
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

    // Add user to customers table if not already present
    $this->addUserToCustomersTable($user);

    session()->forget('payment_data');

    return redirect()->route('Clothing')->with('order_success', 'Payment successful! Order has been placed.');
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

}