<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\IssuingItem
 *
 * @property int $id
 * @property int $issuing_id
 * @property int $product_id
 * @property int $warehouse_location_id
 * @property int $quantity
 * @property float $unit_price
 * @property float $total_price
 * @property string|null $batch_number
 * @property \Illuminate\Support\Carbon|null $expiry_date
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Issuing $issuing
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\WarehouseLocation $location
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|IssuingItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssuingItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssuingItem query()
 * @method static \Database\Factories\IssuingItemFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class IssuingItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'issuing_id',
        'product_id',
        'warehouse_location_id',
        'quantity',
        'unit_price',
        'total_price',
        'batch_number',
        'expiry_date',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
        'expiry_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the issuing that owns the item.
     */
    public function issuing(): BelongsTo
    {
        return $this->belongsTo(Issuing::class);
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
}