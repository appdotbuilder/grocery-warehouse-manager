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
        Schema::create('stock_opname_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_opname_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_location_id')->constrained()->onDelete('cascade');
            $table->string('batch_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('system_quantity'); // Quantity according to system
            $table->integer('physical_quantity')->nullable(); // Counted quantity
            $table->integer('variance')->nullable(); // Difference (physical - system)
            $table->text('notes')->nullable();
            $table->boolean('counted')->default(false);
            $table->timestamp('counted_at')->nullable();
            $table->foreignId('counted_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            // Indexes
            $table->index('stock_opname_id');
            $table->index('product_id');
            $table->index('warehouse_location_id');
            $table->index('counted');
            $table->index(['batch_number', 'expiry_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_opname_items');
    }
};