<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_location_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->string('batch_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('received_date')->nullable();
            $table->decimal('purchase_price', 10, 2)->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index(['product_id', 'warehouse_location_id']);
            $table->index('expiry_date');
            $table->index('batch_number');
            $table->index('quantity');
            
            // Unique constraint to prevent duplicate product-location combinations
            $table->unique(['product_id', 'warehouse_location_id', 'batch_number', 'expiry_date'], 'unique_product_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stock');
    }
};