<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function order($id)
    {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $products = $order->products;

        return view('order', [
            'order' => $order,
            'customer' => $customer,
            'products' => $products
        ]);
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->order_status = 'cancelled';
        $order->save();

        return redirect()->route('customer', ['id' => $order->customer_id]);
    }
}
