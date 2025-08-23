<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $name = fake()->words(3, true);
        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name . '-' . fake()->unique()->numberBetween(1000, 9999)),
            'price' => fake()->randomFloat(2, 10, 1000), // Generate a price between 10 and 1000
            'description' => fake()->sentence(), // Generate a random product description
            'photo' => fake()->imageUrl(), // Use Unsplash images
            'category' => fake()->randomElement(['Cranes', 'Excavators', 'Cars', 'Loaders', 'Bulldozers', 'Forklift']), // Choose a category
        ];
    }
}
