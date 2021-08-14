<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Get the orders for the customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function numOrders() {
        return count($this->orders->where('order_status', '=', 'active'));
    }
}
