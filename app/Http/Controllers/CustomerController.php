<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\order;

class CustomerController extends Controller
{
    public function customers()
    {
        return view('home', [
            'customers' => Customer::paginate(5)
        ]);
    }

    public function customer($id)
    {
        $customer = Customer::findOrFail($id);
        $orders = $customer->orders->where('order_status', '=', 'active');

        return view('customer', [
            'customer' => $customer,
            'orders' => $orders
        ]);
    }
}
