<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'document',
        'phone',
        'personal_photo_path',
        'identity_document_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /** Productos publicados por el arrendador */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /** Transacciones donde este usuario ES el arrendatario */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    /** Transacciones donde este usuario ES el arrendador (solicitudes recibidas) */
    public function receivedTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'landlord_id');
    }
}