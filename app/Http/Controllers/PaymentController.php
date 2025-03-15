<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;

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


public function success()
{
    return view('payment.success')->with('error', 'Payment was successful.');
}

public function cancel()
{
    return view('payment.cancel')->with('error', 'Payment was cancelled.');
}


}