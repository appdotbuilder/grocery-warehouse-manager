<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fresh Produce',
                'code' => 'FP001',
                'description' => 'Fresh fruits and vegetables',
                'status' => 'active',
            ],
            [
                'name' => 'Dairy Products',
                'code' => 'DP001',
                'description' => 'Milk, cheese, yogurt and dairy items',
                'status' => 'active',
            ],
            [
                'name' => 'Meat & Seafood',
                'code' => 'MS001',
                'description' => 'Fresh and frozen meat and seafood',
                'status' => 'active',
            ],
            [
                'name' => 'Bakery',
                'code' => 'BK001',
                'description' => 'Bread, pastries and baked goods',
                'status' => 'active',
            ],
            [
                'name' => 'Pantry Staples',
                'code' => 'PS001',
                'description' => 'Rice, pasta, canned goods, spices',
                'status' => 'active',
            ],
            [
                'name' => 'Beverages',
                'code' => 'BV001',
                'description' => 'Soft drinks, juices, water, coffee, tea',
                'status' => 'active',
            ],
            [
                'name' => 'Frozen Foods',
                'code' => 'FF001',
                'description' => 'Frozen vegetables, ready meals, ice cream',
                'status' => 'active',
            ],
            [
                'name' => 'Household Items',
                'code' => 'HH001',
                'description' => 'Cleaning supplies, personal care, toiletries',
                'status' => 'active',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}