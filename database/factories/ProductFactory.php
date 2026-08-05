<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = fake()->randomElement([
            'Solar Panel Kit',
            'Hybrid Inverter',
            'Battery Backup',
            'Monitoring Gateway',
            'Panel Cleaning Plan',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name.'-'.fake()->unique()->numberBetween(1000, 9999)),
            'price' => fake()->randomFloat(2, 25000, 2500000),
            'description' => fake()->sentence(),
            'photo' => fake()->imageUrl(),
            'category' => fake()->randomElement([
                'Solar Panels',
                'Solar Generators',
                'Portable Power Stations',
                'Solar Power Banks',
                'Solar Lighting',
                'Solar Fans',
                'Solar Inverters',
                'Solar Batteries',
                'Installation Services',
                'Maintenance Plans',
            ]),
        ];
    }
}
