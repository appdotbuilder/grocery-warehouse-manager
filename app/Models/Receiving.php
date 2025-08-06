<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Receiving
 *
 * @property int $id
 * @property string $receiving_number
 * @property int $supplier_id
 * @property \Illuminate\Support\Carbon $received_date
 * @property string|null $invoice_number
 * @property float $total_amount
 * @property string $status
 * @property string|null $notes
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Supplier $supplier
 * @property-read \App\Models\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReceivingItem> $items
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving query()
 * @method static \Database\Factories\ReceivingFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Receiving extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'receiving_number',
        'supplier_id',
        'received_date',
        'invoice_number',
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
        'received_date' => 'date',
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the supplier that owns the receiving.
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the user who created the receiving.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the items for the receiving.
     */
    public function items(): HasMany
    {
        return $this->hasMany(ReceivingItem::class);
    }
}