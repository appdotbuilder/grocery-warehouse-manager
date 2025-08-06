<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\WarehouseLocation
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property string|null $description
 * @property int|null $capacity
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductStock> $stock
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseLocation active()
 * @method static \Database\Factories\WarehouseLocationFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class WarehouseLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'type',
        'description',
        'capacity',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active locations.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the stock records for the location.
     */
    public function stock(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }
}