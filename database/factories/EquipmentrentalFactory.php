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
                'name' => 'Monocrystalline Solar Panel Array',
                'price' => 450000,
                'description' => 'High-efficiency rooftop panels for dependable residential solar generation.',
                'photo' => 'img/solutions/monochry.png',
                'category' => 'Solar Panels',
                'subcategory' => 'Monocrystalline Panels',
            ],
            [
                'name' => 'Home Solar Generator',
                'price' => 850000,
                'description' => 'A quiet solar generator for essential home circuits, emergency backup, and off-grid living.',
                'photo' => 'img/solutions/home-solar-gen.jpg',
                'category' => 'Solar Generators',
                'subcategory' => 'Home Backup Generators',
            ],
            [
                'name' => 'TrailReady Portable Power Station',
                'price' => 520000,
                'description' => 'Portable battery power with flexible outputs for camping, field work, travel, and outages.',
                'photo' => 'img/solutions/powerstation.webp',
                'category' => 'Portable Power Stations',
                'subcategory' => 'Medium Capacity',
            ],
            [
                'name' => 'SunCharge Solar Power Bank',
                'price' => 85000,
                'description' => 'A rugged solar-assisted power bank for charging phones and small devices outdoors.',
                'photo' => 'img/solutions/suncharge.webp',
                'category' => 'Solar Power Banks',
                'subcategory' => 'Rugged Power Banks',
            ],
            [
                'name' => 'Solar Security Lighting Set',
                'price' => 120000,
                'description' => 'Motion-aware solar lighting for driveways, entrances, walkways, and property security.',
                'photo' => 'img/solutions/suncharge.webp',
                'category' => 'Solar Lighting',
                'subcategory' => 'Solar Security Lights',
            ],
            [
                'name' => 'Rechargeable Solar Fan',
                'price' => 95000,
                'description' => 'Efficient rechargeable airflow for rooms, patios, workshops, and backup comfort.',
                'photo' => 'img/solutions/solarfan.jpg',
                'category' => 'Solar Fans',
                'subcategory' => 'Rechargeable Solar Fans',
            ],
            [
                'name' => 'Hybrid Inverter Upgrade',
                'price' => 380000,
                'description' => 'Hybrid inverter package for solar generation, grid support, generator integration, and future battery expansion.',
                'photo' => 'img/solutions/hybrid-inverter.webp',
                'category' => 'Solar Inverters',
                'subcategory' => 'Hybrid Inverters',
            ],
            [
                'name' => 'Lithium Home Battery Package',
                'price' => 720000,
                'description' => 'Modular lithium battery storage for lights, refrigeration, internet, security, and other critical loads.',
                'photo' => 'img/solutions/powerstation.webp',
                'category' => 'Solar Batteries',
                'subcategory' => 'Lithium-Ion Batteries',
            ],
            [
                'name' => 'Residential Solar Installation',
                'price' => 300000,
                'description' => 'Professional site assessment, mounting, wiring, commissioning, and handover for residential systems.',
                'photo' => 'img/solutions/monochry.png',
                'category' => 'Installation Services',
                'subcategory' => 'Residential Installation',
            ],
            [
                'name' => 'Solar Maintenance Plan',
                'price' => 65000,
                'description' => 'Scheduled panel cleaning, inverter inspection, wiring checks, and production reporting for installed systems.',
                'photo' => 'img/solutions/hybrid-inverter.webp',
                'category' => 'Maintenance Plans',
                'subcategory' => 'System Inspection',
            ],
        ];

        $product = fake()->randomElement($products);
        $name = $product['name'];

        return [
            'name' => $name,
            'slug' => Str::slug($name.'-'.fake()->unique()->numberBetween(1000, 9999)),
            'price' => $product['price'],
            'stock_quantity' => fake()->numberBetween(1, 20),
            'availability_status' => 'available',
            'description' => $product['description'],
            'photo' => $product['photo'],
            'category' => $product['category'],
            'subcategory' => $product['subcategory'],
        ];
    }
}
