<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Transaction;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'deposit',
        'image',
        'available',
        'department',
        'city',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations(): HasMany
{
    return $this->hasMany(Reservation::class);
}
public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}
