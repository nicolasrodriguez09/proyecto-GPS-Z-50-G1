<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalTransaction extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'tenant_name',
        'tenant_email',
        'product_name',
        'rental_start_date',
        'rental_end_date',
        'terms_accepted',
        'terms_accepted_at',
        'terms_version',
        'terms_snapshot',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'rental_start_date' => 'date',
            'rental_end_date' => 'date',
            'terms_accepted' => 'boolean',
            'terms_accepted_at' => 'datetime',
        ];
    }
}
