<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $orderTotal = $request->input('amount'); // Order total amount
        $userEmail = auth()->user()->email; // Get logged-in user's email

        // Call PayMongo API to create a checkout session
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY')), // Fix: Removed extra ':'
        ])->post('https://api.paymongo.com/v1/checkout_sessions', [
            'data' => [
                'attributes' => [
                    'amount' => $orderTotal * 100, // Convert to centavos
                    'currency' => 'PHP',
                    'description' => 'Order Payment',
                    'line_items' => [[
                        'name' => 'Order Payment',
                        'quantity' => 1,
                        'amount' => $orderTotal * 100,
                        'currency' => 'PHP'
                    ]],
                    'payment_method_types' => ['gcash', 'card', 'paymaya'],
                    'send_email_receipt' => true,
                    'billing' => [
                        'email' => $userEmail,
                    ],
                    'success_url' => route('payment.success'),
                    'cancel_url' => route('payment.cancel'),
                ]
            ]
        ]);

        // Extract checkout URL
        $checkoutUrl = $response->json()['data']['attributes']['checkout_url'] ?? null;

        if ($checkoutUrl) {
            return redirect()->away($checkoutUrl); // Redirect user to PayMongo checkout
        }

        return back()->with('error', 'Failed to create payment session.');
    }

    public function success()
    {
        return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
