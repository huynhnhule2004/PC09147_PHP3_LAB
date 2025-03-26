<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CommentFactory extends Factory
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
            "product_id" => fake()->randomElement(Product::all()->pluck('id')->toArray()),
            "content" => fake()->paragraph(),
            "status" => fake()->boolean(),
        ];
    }
}
