<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Associate products to their order.
     */
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
