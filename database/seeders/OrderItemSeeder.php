<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        // Specify the order ID
        $orderId = 31;

        // Check if the specified order exists
        $order = Order::find($orderId);
        if (!$order) {
            return; // Stop seeding if the specified order does not exist
        }

        // Fetch two products to associate with the order
        $products = Product::limit(2)->get(); // Get the first two products from the database

        if ($products->isEmpty()) {
            return; // Stop seeding if no products exist
        }

        // Create two OrderItem records for the specified order
        foreach ($products as $product) {
            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $product->id,
                'price' => $product->price,
            ]);
        }
    }
}