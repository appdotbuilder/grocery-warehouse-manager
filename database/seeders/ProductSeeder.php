<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->keyBy('code');

        $products = [
            // Fresh Produce
            [
                'name' => 'Red Apples',
                'sku' => 'FP-APP-RED-001',
                'category_id' => $categories['FP001']->id,
                'description' => 'Fresh red apples from Malang',
                'unit' => 'kg',
                'purchase_price' => 25000,
                'selling_price' => 35000,
                'minimum_stock' => 10,
                'maximum_stock' => 100,
                'current_stock' => 5, // Low stock for demo
                'has_expiry' => true,
                'shelf_life_days' => 14,
                'status' => 'active',
            ],
            [
                'name' => 'Bananas',
                'sku' => 'FP-BAN-YEL-001',
                'category_id' => $categories['FP001']->id,
                'description' => 'Fresh bananas from Lampung',
                'unit' => 'kg',
                'purchase_price' => 15000,
                'selling_price' => 22000,
                'minimum_stock' => 15,
                'maximum_stock' => 150,
                'current_stock' => 25,
                'has_expiry' => true,
                'shelf_life_days' => 7,
                'status' => 'active',
            ],
            [
                'name' => 'Carrots',
                'sku' => 'FP-CAR-ORG-001',
                'category_id' => $categories['FP001']->id,
                'description' => 'Fresh carrots from Batu',
                'unit' => 'kg',
                'purchase_price' => 12000,
                'selling_price' => 18000,
                'minimum_stock' => 20,
                'maximum_stock' => 100,
                'current_stock' => 8, // Low stock for demo
                'has_expiry' => true,
                'shelf_life_days' => 21,
                'status' => 'active',
            ],

            // Dairy Products
            [
                'name' => 'Fresh Milk 1L',
                'sku' => 'DP-MLK-FR-1L',
                'category_id' => $categories['DP001']->id,
                'description' => 'Fresh whole milk 1 liter pack',
                'unit' => 'pcs',
                'purchase_price' => 18000,
                'selling_price' => 25000,
                'minimum_stock' => 30,
                'maximum_stock' => 200,
                'current_stock' => 45,
                'has_expiry' => true,
                'shelf_life_days' => 5,
                'status' => 'active',
            ],
            [
                'name' => 'Greek Yogurt 500ml',
                'sku' => 'DP-YOG-GR-500',
                'category_id' => $categories['DP001']->id,
                'description' => 'Greek style yogurt 500ml container',
                'unit' => 'pcs',
                'purchase_price' => 32000,
                'selling_price' => 45000,
                'minimum_stock' => 20,
                'maximum_stock' => 100,
                'current_stock' => 12,
                'has_expiry' => true,
                'shelf_life_days' => 14,
                'status' => 'active',
            ],

            // Pantry Staples
            [
                'name' => 'Jasmine Rice 5kg',
                'sku' => 'PS-RIC-JAS-5K',
                'category_id' => $categories['PS001']->id,
                'description' => 'Premium jasmine rice 5kg bag',
                'unit' => 'pcs',
                'purchase_price' => 85000,
                'selling_price' => 110000,
                'minimum_stock' => 50,
                'maximum_stock' => 300,
                'current_stock' => 125,
                'has_expiry' => false,
                'shelf_life_days' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Olive Oil 500ml',
                'sku' => 'PS-OIL-OL-500',
                'category_id' => $categories['PS001']->id,
                'description' => 'Extra virgin olive oil 500ml bottle',
                'unit' => 'pcs',
                'purchase_price' => 65000,
                'selling_price' => 85000,
                'minimum_stock' => 25,
                'maximum_stock' => 100,
                'current_stock' => 15,
                'has_expiry' => true,
                'shelf_life_days' => 730, // 2 years
                'status' => 'active',
            ],

            // Beverages
            [
                'name' => 'Orange Juice 1L',
                'sku' => 'BV-JUI-OR-1L',
                'category_id' => $categories['BV001']->id,
                'description' => 'Fresh orange juice 1 liter pack',
                'unit' => 'pcs',
                'purchase_price' => 28000,
                'selling_price' => 38000,
                'minimum_stock' => 40,
                'maximum_stock' => 200,
                'current_stock' => 22,
                'has_expiry' => true,
                'shelf_life_days' => 7,
                'status' => 'active',
            ],
            [
                'name' => 'Mineral Water 1.5L',
                'sku' => 'BV-WAT-MIN-1.5L',
                'category_id' => $categories['BV001']->id,
                'description' => 'Natural mineral water 1.5 liter bottle',
                'unit' => 'pcs',
                'purchase_price' => 3500,
                'selling_price' => 5500,
                'minimum_stock' => 100,
                'maximum_stock' => 500,
                'current_stock' => 85, // Low stock for demo
                'has_expiry' => true,
                'shelf_life_days' => 365,
                'status' => 'active',
            ],

            // Frozen Foods
            [
                'name' => 'Frozen French Fries 1kg',
                'sku' => 'FF-FRI-FR-1K',
                'category_id' => $categories['FF001']->id,
                'description' => 'Frozen french fries 1kg pack',
                'unit' => 'pcs',
                'purchase_price' => 45000,
                'selling_price' => 65000,
                'minimum_stock' => 30,
                'maximum_stock' => 150,
                'current_stock' => 18,
                'has_expiry' => true,
                'shelf_life_days' => 365,
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}