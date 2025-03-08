<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Men’s Gray Shirt',
                'category' => 'Men’s Shirt',
                'price' => 299.99,
                'is_thrift_deal' => true,
                'is_new_arrival' => false,
                'image' => 'assets/img/1.png',
                'description' => 'A comfortable and stylish gray shirt for men, perfect for casual wear.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Women’s Pink Shirt',
                'category' => 'Women’s Shirt',
                'price' => 199.99,
                'is_thrift_deal' => false,
                'is_new_arrival' => true,
                'image' => 'assets/img/1.png',
                'description' => 'A soft and elegant pink shirt for women, great for everyday fashion.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Women’s Denim Pants',
                'category' => 'Women’s Pants',
                'price' => 499.99,
                'is_thrift_deal' => true,
                'is_new_arrival' => true,
                'image' => 'assets/img/1.png',
                'description' => 'High-quality denim pants for women, durable and trendy.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
        
    }
}
