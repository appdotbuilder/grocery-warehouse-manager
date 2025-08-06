<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\WarehouseLocation;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WarehouseDashboardController extends Controller
{
    /**
     * Display the warehouse dashboard.
     */
    public function index()
    {
        // Get key metrics
        $totalProducts = Product::active()->count();
        $totalSuppliers = Supplier::active()->count();
        $totalCustomers = Customer::active()->count();
        $totalLocations = WarehouseLocation::active()->count();

        // Get low stock products
        $lowStockProducts = Product::with('category')
            ->lowStock()
            ->limit(5)
            ->get();

        // Get products expiring soon (within 30 days)
        $expiringProducts = ProductStock::with(['product', 'location'])
            ->expiringSoon(30)
            ->limit(5)
            ->get();

        // Get recent stock movements
        $recentMovements = StockMovement::with(['product', 'fromLocation', 'toLocation', 'creator'])
            ->latest()
            ->limit(10)
            ->get();

        // Get total stock value
        $totalStockValue = ProductStock::selectRaw('SUM(quantity * purchase_price) as total')
            ->value('total') ?? 0;

        // Get categories with product count
        $categories = Category::withCount('products')
            ->active()
            ->get();

        return Inertia::render('welcome', [
            'metrics' => [
                'total_products' => $totalProducts,
                'total_suppliers' => $totalSuppliers,
                'total_customers' => $totalCustomers,
                'total_locations' => $totalLocations,
                'total_stock_value' => $totalStockValue,
            ],
            'low_stock_products' => $lowStockProducts,
            'expiring_products' => $expiringProducts,
            'recent_movements' => $recentMovements,
            'categories' => $categories,
        ]);
    }
}