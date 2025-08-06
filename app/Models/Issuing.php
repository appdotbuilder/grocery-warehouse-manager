<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Issuing
 *
 * @property int $id
 * @property string $issuing_number
 * @property int $customer_id
 * @property \Illuminate\Support\Carbon $issued_date
 * @property string|null $order_number
 * @property float $total_amount
 * @property string $status
 * @property string|null $notes
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IssuingItem> $items
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Issuing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Issuing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Issuing query()
 * @method static \Database\Factories\IssuingFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Issuing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'issuing_number',
        'customer_id',
        'issued_date',
        'order_number',
        'total_amount',
        'status',
        'notes',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'issued_date' => 'date',
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the customer that owns the issuing.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the user who created the issuing.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the items for the issuing.
     */
    public function items(): HasMany
    {
        return $this->hasMany(IssuingItem::class);
    }
}