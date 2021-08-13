<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 15 random customers
        Customer::factory()->count(15)->create();

        // Create 15 random products
        Product::factory()->count(15)->create();

        $this->call(OrderTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
    }
}
