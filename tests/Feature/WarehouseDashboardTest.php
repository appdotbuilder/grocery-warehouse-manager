<?php

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Supplier;
use App\Models\WarehouseLocation;
use App\Models\User;

test('warehouse dashboard displays correctly', function () {
    // Create test data
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $supplier = Supplier::factory()->create();
    $customer = Customer::factory()->create();
    $location = WarehouseLocation::factory()->create();
    
    $product = Product::factory()->create([
        'category_id' => $category->id,
        'current_stock' => 5,
        'minimum_stock' => 10, // Low stock
    ]);

    ProductStock::factory()->create([
        'product_id' => $product->id,
        'warehouse_location_id' => $location->id,
        'quantity' => 5,
        'expiry_date' => now()->addDays(5), // Expiring soon
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertInertia(fn ($page) =>
        $page->component('welcome')
            ->has('metrics')
            ->has('low_stock_products')
            ->has('expiring_products')
            ->has('categories')
    );
});

test('low stock products are identified', function () {
    $category = Category::factory()->create();
    
    // Create a low stock product
    $lowStockProduct = Product::factory()->create([
        'category_id' => $category->id,
        'current_stock' => 5,
        'minimum_stock' => 10,
    ]);

    // Create a normal stock product
    $normalStockProduct = Product::factory()->create([
        'category_id' => $category->id,
        'current_stock' => 50,
        'minimum_stock' => 10,
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertInertia(fn ($page) =>
        $page->has('low_stock_products.0.id')
            ->where('low_stock_products.0.id', $lowStockProduct->id)
    );
});