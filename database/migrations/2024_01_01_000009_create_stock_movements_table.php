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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->string('movement_number')->unique();
            $table->enum('type', ['in', 'out', 'transfer', 'adjustment', 'opname']);
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('from_location_id')->nullable()->constrained('warehouse_locations')->onDelete('cascade');
            $table->foreignId('to_location_id')->nullable()->constrained('warehouse_locations')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('batch_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->decimal('total_value', 10, 2)->default(0);
            $table->string('reference_type')->nullable(); // receiving, issuing, transfer, opname
            $table->unsignedBigInteger('reference_id')->nullable(); // ID of related document
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            // Indexes
            $table->index('movement_number');
            $table->index('type');
            $table->index('product_id');
            $table->index(['from_location_id', 'to_location_id']);
            $table->index('created_at');
            $table->index(['reference_type', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};