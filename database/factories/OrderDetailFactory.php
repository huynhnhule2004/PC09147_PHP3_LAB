<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => fake()->randomElement(Order::all()->pluck('id')->toArray()),
            "product_id" => fake()->randomElement(Product::all()->pluck('id')->toArray()),
            'qty' => fake()->numberBetween(1, 5),
            'price' => fake()->randomFloat(2, 10, 500),
        ];
    }
}
