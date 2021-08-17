<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function order($id)
    {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $orderProducts = $order->products;
        $products = Product::all();

        return view('order', [
            'order' => $order,
            'customer' => $customer,
            'orderProducts' => $orderProducts,
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

    public function removeProduct($orderId, $pivotId)
    {
        $order = Order::findOrFail($orderId);
        $order->products()->wherePivot('id', '=', $pivotId)->detach();

        $total = 0;
        foreach($order->products as $product) {
            $total += $product->price;
        }
        $order->total_value = $total;

        $order->save();

        return redirect()->route('order', ['id' => $order->id]);
    }

    public function addProduct($orderId, $productId)
    {
        $order = Order::findOrFail($orderId);
        $order->products()->attach($productId);

        $total = 0;
        foreach($order->products as $product) {
            $total += $product->price;
        }
        $order->total_value = $total;

        $order->save();

        return redirect()->route('order', ['id' => $order->id]);
    }
}
