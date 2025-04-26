<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();
    
        if ($orders->isEmpty() || $products->isEmpty()) {
            return; // Stop seeding if no orders or products exist
        }
    
        foreach ($orders as $order) {
            $randomProducts = $products->random(max(1, rand(1, 3))); // Ensure at least 1 product
    
            foreach ($randomProducts as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                ]);
            }
        }
    }
    
}
