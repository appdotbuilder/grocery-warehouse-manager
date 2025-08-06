<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\StockOpname
 *
 * @property int $id
 * @property string $opname_number
 * @property string $name
 * @property \Illuminate\Support\Carbon $opname_date
 * @property int|null $warehouse_location_id
 * @property string $status
 * @property string|null $notes
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\WarehouseLocation|null $location
 * @property-read \App\Models\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StockOpnameItem> $items
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpname newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpname newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockOpname query()
 * @method static \Database\Factories\StockOpnameFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class StockOpname extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'opname_number',
        'name',
        'opname_date',
        'warehouse_location_id',
        'status',
        'notes',
        'created_by',
        'completed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'opname_date' => 'date',
        'completed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the warehouse location that owns the opname.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(WarehouseLocation::class, 'warehouse_location_id');
    }

    /**
     * Get the user who created the opname.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the items for the opname.
     */
    public function items(): HasMany
    {
        return $this->hasMany(StockOpnameItem::class);
    }
}