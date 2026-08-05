<?php

namespace Database\Seeders;

use App\Models\Equipmentrental;
use Illuminate\Database\Seeder;

class EquipmentRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Monocrystalline Solar Panel Array',
                'slug' => 'monocrystalline-solar-panel-array',
                'price' => 450000,
                'description' => 'High-efficiency rooftop panels for dependable residential solar generation.',
                'photo' => 'img/solutions/monochry.png',
                'category' => 'Solar Panels',
                'subcategory' => 'Monocrystalline Panels',
            ],
            [
                'name' => 'Home Solar Generator',
                'slug' => 'home-solar-generator',
                'price' => 850000,
                'description' => 'A quiet solar generator for essential home circuits, emergency backup, and off-grid living.',
                'photo' => 'img/solutions/home-solar-gen.jpg',
                'category' => 'Solar Generators',
                'subcategory' => 'Home Backup Generators',
            ],
            [
                'name' => 'TrailReady Portable Power Station',
                'slug' => 'trailready-portable-power-station',
                'price' => 520000,
                'description' => 'Portable battery power with flexible outputs for camping, field work, travel, and outages.',
                'photo' => 'img/solutions/powerstation.webp',
                'category' => 'Portable Power Stations',
                'subcategory' => 'Medium Capacity',
            ],
            [
                'name' => 'SunCharge Solar Power Bank',
                'slug' => 'suncharged-solar-power-bank',
                'price' => 85000,
                'description' => 'A rugged solar-assisted power bank for charging phones and small devices outdoors.',
                'photo' => 'img/solutions/suncharge.webp',
                'category' => 'Solar Power Banks',
                'subcategory' => 'Rugged Power Banks',
            ],
            [
                'name' => 'Solar Security Lighting Set',
                'slug' => 'solar-security-lighting-set',
                'price' => 120000,
                'description' => 'Motion-aware solar lighting for driveways, entrances, walkways, and property security.',
                'photo' => 'img/solutions/suncharge.webp',
                'category' => 'Solar Lighting',
                'subcategory' => 'Solar Security Lights',
            ],
            [
                'name' => 'Rechargeable Solar Fan',
                'slug' => 'rechargeable-solar-fan',
                'price' => 95000,
                'description' => 'Efficient rechargeable airflow for rooms, patios, workshops, and backup comfort.',
                'photo' => 'img/solutions/solarfan.jpg',
                'category' => 'Solar Fans',
                'subcategory' => 'Rechargeable Solar Fans',
            ],
            [
                'name' => 'Hybrid Inverter Upgrade',
                'slug' => 'hybrid-inverter-upgrade',
                'price' => 380000,
                'description' => 'Hybrid inverter package for solar generation, grid support, generator integration, and future battery expansion.',
                'photo' => 'img/solutions/hybrid-inverter.webp',
                'category' => 'Solar Inverters',
                'subcategory' => 'Hybrid Inverters',
            ],
            [
                'name' => 'Lithium Home Battery Package',
                'slug' => 'lithium-home-battery-package',
                'price' => 720000,
                'description' => 'Modular lithium battery storage for lights, refrigeration, internet, security, and other critical loads.',
                'photo' => 'img/solutions/powerstation.webp',
                'category' => 'Solar Batteries',
                'subcategory' => 'Lithium-Ion Batteries',
            ],
            [
                'name' => 'Residential Solar Installation',
                'slug' => 'residential-solar-installation',
                'price' => 300000,
                'description' => 'Professional site assessment, mounting, wiring, commissioning, and handover for residential systems.',
                'photo' => 'img/solutions/monochry.png',
                'category' => 'Installation Services',
                'subcategory' => 'Residential Installation',
            ],
            [
                'name' => 'Solar Maintenance Plan',
                'slug' => 'solar-maintenance-plan',
                'price' => 65000,
                'description' => 'Scheduled panel cleaning, inverter inspection, wiring checks, and production reporting for installed systems.',
                'photo' => 'img/solutions/hybrid-inverter.webp',
                'category' => 'Maintenance Plans',
                'subcategory' => 'System Inspection',
            ],
        ];

        foreach ($products as $product) {
            Equipmentrental::query()->updateOrCreate(
                ['slug' => $product['slug']],
                [...$product, 'stock_quantity' => 10, 'availability_status' => 'available'],
            );
        }
    }
}
