import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Link } from '@inertiajs/react';

interface Product {
    id: number;
    name: string;
    sku: string;
    current_stock: number;
    minimum_stock: number;
    unit: string;
    category: {
        name: string;
    };
}

interface ExpiringProduct {
    id: number;
    quantity: number;
    batch_number?: string;
    expiry_date: string;
    product: {
        name: string;
        sku: string;
    };
    location: {
        name: string;
    };
}

interface StockMovement {
    id: number;
    movement_number: string;
    type: string;
    quantity: number;
    created_at: string;
    product: {
        name: string;
        sku: string;
    };
    from_location?: {
        name: string;
    };
    to_location?: {
        name: string;
    };
    creator: {
        name: string;
    };
}

interface Category {
    id: number;
    name: string;
    code: string;
    products_count: number;
}

interface Props {
    metrics?: {
        total_products: number;
        total_suppliers: number;
        total_customers: number;
        total_locations: number;
        total_stock_value: number;
    };
    low_stock_products?: Product[];
    expiring_products?: ExpiringProduct[];
    recent_movements?: StockMovement[];
    categories?: Category[];
    [key: string]: unknown;
}

export default function Welcome({ 
    metrics, 
    low_stock_products, 
    expiring_products, 
    recent_movements,
    categories 
}: Props) {
    const formatCurrency = (value: number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        }).format(value);
    };

    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString('id-ID');
    };

    const getMovementTypeColor = (type: string) => {
        switch (type) {
            case 'in':
                return 'bg-green-100 text-green-800';
            case 'out':
                return 'bg-red-100 text-red-800';
            case 'transfer':
                return 'bg-blue-100 text-blue-800';
            case 'adjustment':
                return 'bg-yellow-100 text-yellow-800';
            case 'opname':
                return 'bg-purple-100 text-purple-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    };

    return (
        <AppShell>
            <div className="container mx-auto px-4 py-8">
                {/* Hero Section */}
                <div className="text-center mb-12">
                    <h1 className="text-4xl font-bold text-gray-900 mb-4">
                        🏬 Warehouse Management System
                    </h1>
                    <p className="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                        Complete solution for managing your grocery warehouse operations. Track inventory, manage suppliers & customers, handle stock movements, and maintain accurate records with smart alerts and comprehensive reporting.
                    </p>
                    
                    <div className="flex gap-4 justify-center">
                        <Link href="/login">
                            <Button size="lg" className="text-lg px-8">
                                🔑 Login to Dashboard
                            </Button>
                        </Link>
                        <Link href="/register">
                            <Button variant="outline" size="lg" className="text-lg px-8">
                                👤 Create Account
                            </Button>
                        </Link>
                    </div>
                </div>

                {/* Key Metrics */}
                {metrics && (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-2xl font-bold text-blue-600">
                                    {metrics.total_products.toLocaleString()}
                                </CardTitle>
                                <CardDescription>📦 Total Products</CardDescription>
                            </CardHeader>
                        </Card>
                        
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-2xl font-bold text-green-600">
                                    {metrics.total_suppliers.toLocaleString()}
                                </CardTitle>
                                <CardDescription>🏭 Active Suppliers</CardDescription>
                            </CardHeader>
                        </Card>
                        
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-2xl font-bold text-purple-600">
                                    {metrics.total_customers.toLocaleString()}
                                </CardTitle>
                                <CardDescription>🤝 Active Customers</CardDescription>
                            </CardHeader>
                        </Card>
                        
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-2xl font-bold text-orange-600">
                                    {metrics.total_locations.toLocaleString()}
                                </CardTitle>
                                <CardDescription>📍 Storage Locations</CardDescription>
                            </CardHeader>
                        </Card>
                        
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-2xl font-bold text-red-600">
                                    {formatCurrency(metrics.total_stock_value)}
                                </CardTitle>
                                <CardDescription>💰 Total Stock Value</CardDescription>
                            </CardHeader>
                        </Card>
                    </div>
                )}

                {/* Feature Highlights */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">📋 Inventory Management</CardTitle>
                            <CardDescription>
                                Complete product catalog with categories, SKUs, pricing, and stock levels
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Product categories and organization</li>
                                <li>• Automatic stock level tracking</li>
                                <li>• Low stock alerts and notifications</li>
                                <li>• Batch and expiry date management</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">📦 Warehouse Operations</CardTitle>
                            <CardDescription>
                                Receiving, issuing, and internal stock movements
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Goods receiving from suppliers</li>
                                <li>• Stock issuing for customer orders</li>
                                <li>• Internal stock transfers between locations</li>
                                <li>• Complete movement history tracking</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">🔍 Stock Taking (Opname)</CardTitle>
                            <CardDescription>
                                Physical count verification and stock adjustments
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Scheduled stock counting sessions</li>
                                <li>• System vs physical quantity comparison</li>
                                <li>• Variance analysis and adjustments</li>
                                <li>• Comprehensive opname reports</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">🏭 Supplier Management</CardTitle>
                            <CardDescription>
                                Track suppliers and manage procurement relationships
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Supplier contact information</li>
                                <li>• Purchase history and performance</li>
                                <li>• Invoice and payment tracking</li>
                                <li>• Supplier performance analytics</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">🤝 Customer Management</CardTitle>
                            <CardDescription>
                                Manage customer relationships and sales operations
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Customer profiles and contact details</li>
                                <li>• Sales history and order tracking</li>
                                <li>• Credit limit management</li>
                                <li>• Customer performance insights</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="text-xl">📊 Smart Alerts & Reports</CardTitle>
                            <CardDescription>
                                Intelligent notifications and comprehensive reporting
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <ul className="space-y-2 text-sm">
                                <li>• Low stock level warnings</li>
                                <li>• Product expiry notifications</li>
                                <li>• Stock movement reports</li>
                                <li>• Financial and operational analytics</li>
                            </ul>
                        </CardContent>
                    </Card>
                </div>

                {/* Live Data Sections - Only show when user is authenticated */}
                {metrics && (
                    <>
                        {/* Low Stock Alert */}
                        {low_stock_products && low_stock_products.length > 0 && (
                            <Card className="mb-8">
                                <CardHeader>
                                    <CardTitle className="text-xl text-red-600">
                                        ⚠️ Low Stock Alert
                                    </CardTitle>
                                    <CardDescription>
                                        Products that need restocking
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        {low_stock_products.map((product) => (
                                            <div key={product.id} className="flex items-center justify-between p-4 border rounded-lg bg-red-50">
                                                <div>
                                                    <h4 className="font-semibold">{product.name}</h4>
                                                    <p className="text-sm text-gray-600">
                                                        SKU: {product.sku} | Category: {product.category.name}
                                                    </p>
                                                </div>
                                                <div className="text-right">
                                                    <p className="text-lg font-bold text-red-600">
                                                        {product.current_stock} {product.unit}
                                                    </p>
                                                    <p className="text-sm text-gray-600">
                                                        Min: {product.minimum_stock} {product.unit}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Expiring Products */}
                        {expiring_products && expiring_products.length > 0 && (
                            <Card className="mb-8">
                                <CardHeader>
                                    <CardTitle className="text-xl text-orange-600">
                                        ⏰ Expiring Soon
                                    </CardTitle>
                                    <CardDescription>
                                        Products expiring within 30 days
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        {expiring_products.map((item) => (
                                            <div key={item.id} className="flex items-center justify-between p-4 border rounded-lg bg-orange-50">
                                                <div>
                                                    <h4 className="font-semibold">{item.product.name}</h4>
                                                    <p className="text-sm text-gray-600">
                                                        Location: {item.location.name}
                                                        {item.batch_number && ` | Batch: ${item.batch_number}`}
                                                    </p>
                                                </div>
                                                <div className="text-right">
                                                    <p className="text-lg font-bold text-orange-600">
                                                        {item.quantity} pcs
                                                    </p>
                                                    <p className="text-sm text-gray-600">
                                                        Expires: {formatDate(item.expiry_date)}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Recent Stock Movements */}
                        {recent_movements && recent_movements.length > 0 && (
                            <Card className="mb-8">
                                <CardHeader>
                                    <CardTitle className="text-xl">
                                        📋 Recent Stock Movements
                                    </CardTitle>
                                    <CardDescription>
                                        Latest inventory transactions
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        {recent_movements.map((movement) => (
                                            <div key={movement.id} className="flex items-center justify-between p-4 border rounded-lg">
                                                <div className="flex-1">
                                                    <div className="flex items-center gap-2 mb-2">
                                                        <Badge className={getMovementTypeColor(movement.type)}>
                                                            {movement.type.toUpperCase()}
                                                        </Badge>
                                                        <span className="font-mono text-sm">
                                                            {movement.movement_number}
                                                        </span>
                                                    </div>
                                                    <h4 className="font-semibold">{movement.product.name}</h4>
                                                    <p className="text-sm text-gray-600">
                                                        {movement.from_location?.name && `From: ${movement.from_location.name}`}
                                                        {movement.to_location?.name && ` → To: ${movement.to_location.name}`}
                                                    </p>
                                                    <p className="text-xs text-gray-500">
                                                        By {movement.creator.name} on {formatDate(movement.created_at)}
                                                    </p>
                                                </div>
                                                <div className="text-right">
                                                    <p className="text-lg font-bold">
                                                        {movement.quantity} pcs
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Product Categories */}
                        {categories && categories.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle className="text-xl">
                                        📂 Product Categories
                                    </CardTitle>
                                    <CardDescription>
                                        Inventory organized by category
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        {categories.map((category) => (
                                            <div key={category.id} className="p-4 border rounded-lg bg-blue-50">
                                                <h4 className="font-semibold text-lg">{category.name}</h4>
                                                <p className="text-sm text-gray-600 mb-2">Code: {category.code}</p>
                                                <p className="text-2xl font-bold text-blue-600">
                                                    {category.products_count} products
                                                </p>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}
                    </>
                )}

                {/* Call to Action - Always show */}
                <div className="text-center mt-16 p-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl">
                    <h2 className="text-3xl font-bold text-gray-900 mb-4">
                        Ready to Optimize Your Warehouse?
                    </h2>
                    <p className="text-lg text-gray-600 mb-6">
                        Start managing your inventory efficiently with our comprehensive warehouse management system
                    </p>
                    <div className="flex gap-4 justify-center">
                        <Link href="/login">
                            <Button size="lg" className="text-lg px-8">
                                Get Started Now
                            </Button>
                        </Link>
                        <Link href="/register">
                            <Button variant="outline" size="lg" className="text-lg px-8">
                                Create Free Account
                            </Button>
                        </Link>
                    </div>
                </div>
            </div>
        </AppShell>
    );
}