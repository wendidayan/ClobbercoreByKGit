<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure there are users and payment methods before inserting orders
        $user = User::first();
        $paymentMethods = PaymentMethod::all();

        if (!$user || $paymentMethods->isEmpty()) {
            return; // Stop if no users or payment methods exist
        }

        // Insert sample orders using the Order model
        Order::create([
            'user_id' => 2,
            'payment_method_id' => 1,
            'total_price' => 500.00,
            'status' => 'completed',
        ]);

        Order::create([
            'user_id' => 2,
            'payment_method_id' => 1,
            'total_price' => 750.50,
            'status' => 'completed',
        ]);

        Order::create([
            'user_id' => 2,
            'payment_method_id' => 1,
            'total_price' => 1200.75,
            'status' => 'completed',
        ]);
    }
}
