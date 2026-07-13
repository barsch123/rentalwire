<?php

namespace Database\Factories;

use App\Models\Equipmentrental;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Equipmentrental>
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
        $products = [
            [
                'name' => 'Residential Solar Starter Kit',
                'price' => 450000,
                'description' => 'A practical rooftop package with solar panels, mounting hardware, inverter, and monitoring for small homes.',
                'photo' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80',
                'category' => 'Complete Solar Kits',
                'subcategory' => 'Grid-Tied Kits',
            ],
            [
                'name' => 'Commercial Solar Array',
                'price' => 2500000,
                'description' => 'High-output solar design for offices, warehouses, shops, and campuses with production monitoring included.',
                'photo' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=900&q=80',
                'category' => 'Solar Panels',
                'subcategory' => 'Bifacial Panels',
            ],
            [
                'name' => 'Hybrid Inverter Upgrade',
                'price' => 380000,
                'description' => 'Hybrid inverter package for solar generation, grid support, generator integration, and future battery expansion.',
                'photo' => 'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?auto=format&fit=crop&w=900&q=80',
                'category' => 'Inverters & Controls',
                'subcategory' => 'Hybrid Inverters',
            ],
            [
                'name' => 'Battery Backup Package',
                'price' => 720000,
                'description' => 'Modular battery storage sized for lights, refrigeration, internet, security, and other critical loads.',
                'photo' => 'https://images.unsplash.com/photo-1592833159155-c62df1b65634?auto=format&fit=crop&w=900&q=80',
                'category' => 'Battery Storage',
                'subcategory' => 'Home Batteries',
            ],
            [
                'name' => 'Solar Maintenance Plan',
                'price' => 65000,
                'description' => 'Scheduled panel cleaning, inverter inspection, wiring checks, and production reporting for installed systems.',
                'photo' => 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?auto=format&fit=crop&w=900&q=80',
                'category' => 'Monitoring & Maintenance',
                'subcategory' => 'Maintenance Plans',
            ],
        ];

        $product = fake()->randomElement($products);
        $name = $product['name'];

        return [
            'name' => $name,
            'slug' => Str::slug($name.'-'.fake()->unique()->numberBetween(1000, 9999)),
            'price' => $product['price'],
            'description' => $product['description'],
            'photo' => $product['photo'],
            'category' => $product['category'],
            'subcategory' => $product['subcategory'],
        ];
    }
}
