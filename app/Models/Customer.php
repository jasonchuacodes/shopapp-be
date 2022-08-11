<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'contact',
        'password'
    ];

    protected $guarded = [];

    public function carts() {
        return $this->hasMany(Cart::class);
    }
    
}
