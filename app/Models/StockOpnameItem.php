<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StockOpnameItem
 *
 * @property int $id
 * @property int $stock_opname_id
 * @property int $product_id
 * @property int $warehouse_location_id
 * @property string|null $batch_number
 * @property \Illuminate\Support\Carbon|null $expiry_date
 * @property int $system_quantity
 * @property int|null $physical_quantity
 * @property int|null $variance
 * @property string|null $notes
 * @property bool $counted
 * @property \Illuminate\Support\Carbon|null $counted_at
 * @property int|null $counted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\StockOpname $opname
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\WarehouseLocation $location
 * @property-read \App\Models\User|null $counter
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpnameItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpnameItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpnameItem query()
 * @method static \Database\Factories\StockOpnameItemFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class StockOpnameItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'stock_opname_id',
        'product_id',
        'warehouse_location_id',
        'batch_number',
        'expiry_date',
        'system_quantity',
        'physical_quantity',
        'variance',
        'notes',
        'counted',
        'counted_at',
        'counted_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expiry_date' => 'date',
        'counted' => 'boolean',
        'counted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the opname that owns the item.
     */
    public function opname(): BelongsTo
    {
        return $this->belongsTo(StockOpname::class, 'stock_opname_id');
    }

    /**
     * Get the product that owns the item.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the warehouse location that owns the item.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(WarehouseLocation::class, 'warehouse_location_id');
    }

    /**
     * Get the user who counted the item.
     */
    public function counter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'counted_by');
    }
}