<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;


    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'order_status' => 'active',
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_date' => date('Y-m-d'),
            'order_status' => $this->faker->randomElement(['active', 'cancelled'])
        ];
    }
}
