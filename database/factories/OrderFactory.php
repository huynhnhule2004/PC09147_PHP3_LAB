<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => fake()->randomElement(User::all()->pluck('id')->toArray()),
            "customer_name" => fake()->name(),
            'status' => fake()->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'phone' => fake()->numerify('098#######'),
            'address' => fake()->address(),
        ];
    }
}
