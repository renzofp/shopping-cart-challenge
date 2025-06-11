<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['session_id', 'product_name', 'price', 'quantity'];

    public function scopeForCurrentSession($query)
    {
        return $query->where('session_id', session()->getId());
    }

    public function getLineTotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }
}
