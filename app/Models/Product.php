<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable = [
    'name',
    'description',
    'price',
    'deposit',
    'image',
    'available',
    'location',
    'user_id'
];

}
