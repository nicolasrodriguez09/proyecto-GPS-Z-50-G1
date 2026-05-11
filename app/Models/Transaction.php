<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'landlord_id',
        'product_id',
        'item_name',
        'starts_at',
        'ends_at',
        'rental_days',
        'total_amount',
        'status',
        'terms_version',
        'terms_snapshot',
        'accepted_terms_at',
    ];

    protected $casts = [
        'starts_at'         => 'date',
        'ends_at'           => 'date',
        'accepted_terms_at' => 'datetime',
        'total_amount'      => 'decimal:2',
    ];

    /** El arrendatario que solicitó el alquiler */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** El arrendador dueño del producto */
    public function landlord(): BelongsTo
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    /** Producto asociado (opcional, si se guarda la FK) */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}