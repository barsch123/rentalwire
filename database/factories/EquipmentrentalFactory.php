<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipmentrental>
 */
class EquipmentrentalFactory extends Factory
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
            'price' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->sentence(),
            'photo' => fake()->randomElement([
                'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 40),
            ]),
            'category' => $category = fake()->randomElement([
                'Dozers',
                'Excavators',
                'Loaders',
                'Scrapers',
                'Graders',
                'Compactors',
                'Dump Trucks',
                'Cranes',
                'Trenchers',
                'Pavers',
                'Drilling Equipment'
            ]),
            'subcategory' => function () use ($category) {
                switch ($category) {
                    case 'Dozers':
                        return fake()->randomElement(['Bulldozer', 'Track-Type Dozer']);
                    case 'Excavators':
                        return fake()->randomElement(['Crawler Excavator', 'Mini Excavator']);
                    case 'Loaders':
                        return fake()->randomElement(['Backhoe Loader', 'Wheel Loader', 'Skid Steer Loader']);
                    case 'Scrapers':
                        return fake()->randomElement(['Motor Scraper']);
                    case 'Graders':
                        return fake()->randomElement(['Motor Grader']);
                    case 'Compactors':
                        return fake()->randomElement(['Soil Compactor', 'Vibratory Roller']);
                    case 'Dump Trucks':
                        return fake()->randomElement(['Articulated Dump Truck', 'Fuel/Water Trucks']);
                    case 'Cranes':
                        return fake()->randomElement(['Crawler Crane']);
                    case 'Trenchers':
                        return fake()->randomElement(['Chain Trencher']);
                    case 'Pavers':
                        return fake()->randomElement(['Asphalt Paver']);
                    case 'Drilling Equipment':
                        return fake()->randomElement(['Rotary Drill']);
                    default:
                        return null;
                }
            }
        ];
    }
}
