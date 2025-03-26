<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "slug" => fake()->slug(),
            "description" => fake()->paragraph(),
            "content" => fake()->text(),
            "price" => fake()->randomFloat(),
            "sale_price" => fake()->randomFloat(),
            "thumbnail" => fake()->imageUrl(),
            "category_id" => fake()->randomElement(Category::all()->pluck('id')->toArray()),

        ];
    }
}
