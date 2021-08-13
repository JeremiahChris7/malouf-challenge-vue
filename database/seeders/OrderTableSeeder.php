<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Order;
use App\Models\Customer;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();

        // Create 15 random orders (without products)
        Order::factory()->count(15)
            ->state(
                function (array $attributes) use ($customers) {

                    $customer = $customers->random();

                    return [
                        'customer_id' => $customer->id,
                        'shipping_address' => $customer->address
                    ];
                }
            )->create();

    }
}
