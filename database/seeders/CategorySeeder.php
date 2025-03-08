<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        $categories = [
            'Men\'s' => ['Shirts', 'Shoes', 'Bags'],
            'Women\'s' => ['Dresses', 'Shoes', 'Handbags'],
            'Kids' => ['Toys', 'Clothes', 'Shoes']
        ];
    
        foreach ($categories as $categoryName => $subcategories) {
            // Create the category
            $category = Category::create(['name' => $categoryName]);
    
            // Create subcategories linked to the category
            foreach ($subcategories as $subcategoryName) {
                Subcategory::create([
                    'name' => $subcategoryName,
                    'category_id' => $category->id // Associate subcategory with the category
                ]);
            }
        }
    }
    
}
