<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function cartItem() {
        return $this->hasMany(CartItem::class);
    }
}
