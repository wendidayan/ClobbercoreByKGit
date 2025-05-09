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
                'success_url' => route('payment.success'), 
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
    $defaultAddress = $user->addresses()->where('is_default', true)->first();
    $totalAmount = collect($mineItems)->sum(fn($item) => $item['price']);
    $deliveryMethodName = session('delivery_method', 'shipping');

   // Shipping fee calculation based on city — only apply if delivery method is shipping
   $shippingFee = 0;

   if (session('delivery_method') === 'shipping') {
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

   $paymentMethodName = session('payment_method', 'gcash');
    
   $paymentMethod = PaymentMethod::firstOrCreate([
    'name' => $paymentMethodName
    ]);

    // Get or create delivery method
    $deliveryMethod = DeliveryMethod::firstOrCreate([
        'name' => $deliveryMethodName
    ]);

    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'delivery_method_id' => $deliveryMethod->id,
        'shipping_address_id' => session('delivery_method') === 'shipping' ? session('shipping_address_id') : null,
        'meetup_location_id' => session('delivery_method') === 'meetup' ? session('meetup_location_id') : null,
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
    session()->forget('payment_method');


    return redirect()->route('Clothing')->with('order_success', 'Payment successful! Order has been placed.');
}


public function cancel(Request $request)
{
    return redirect()->route('order.topay')->with('error', 'Payment was cancelled. Please review your order.');
}















//for cart

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
                'cancel_url' => route('order.topaycart'),
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
    $deliveryMethodName = session('delivery_method', 'shipping');
    $user = auth()->user();

    // Shipping fee calculation based on city — only apply if delivery method is shipping
    $defaultAddress = $user->addresses()->where('is_default', true)->first();
    $shippingFee = 0;

   if (session('delivery_method') === 'shipping') {
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

   $paymentMethodName = $paymentData['payment_method'] ?? 'gcash'; // ✅ Correct!
    
   $paymentMethod = PaymentMethod::firstOrCreate([
    'name' => $paymentMethodName
    ]);

    $deliveryMethod = DeliveryMethod::firstOrCreate([
        'name' => $paymentData['delivery_method']
    ]);
    
    $order = Order::create([
        'user_id' => $user->id,
        'payment_method_id' => $paymentMethod->id,
        'delivery_method_id' => $deliveryMethod->id,
        'shipping_address_id' => $paymentData['delivery_method'] === 'shipping' ? $paymentData['shipping_address_id'] ?? null : null,
        'meetup_location_id' => $paymentData['delivery_method'] === 'meetup' ? $paymentData['meetup_location_id'] ?? null : null,
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

    // Add user to customers table if not already present
    $this->addUserToCustomersTable($user);

    session()->forget('payment_data');
    session()->forget('payment_method');

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