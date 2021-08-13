<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the products
        $products = Product::all();

        // Put 1 - 5 products into each order (in the pivot)
        Order::all()->each(function ($order) use ($products) {
            $randProducts = $products->random(rand(1, 5));
            $randProductIds = $randProducts->pluck('id')->toArray();

            $order->products()->attach($randProductIds);

            $total = 0;
            foreach($randProducts as $product) {
                $total += $product->price;
            }

            $order->total_value = $total;

            $order->save();
        });
    }
}
