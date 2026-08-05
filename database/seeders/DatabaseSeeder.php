<?php

namespace Database\Seeders;

use App\Models\Equipmentrental;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EquipmentRentalSeeder::class);
        Newsletter::factory(1)->create();
        Product::factory(50)->create();

        $this->call(BlogSeeder::class);

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
                'usertype' => 'user',
                'membership_tier' => 'standard',
                'discount_percent' => 3,
                'email_verified_at' => now(),
            ],
        );

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Test Admin',
                'password' => 'password',
                'usertype' => 'admin',
                'email_verified_at' => now(),
            ],
        );

        $customers = [
            ['name' => 'Alicia Brown', 'email' => 'alicia@example.com', 'membership_tier' => 'standard', 'discount_percent' => 3],
            ['name' => 'Marcus Campbell', 'email' => 'marcus@example.com', 'membership_tier' => 'silver', 'discount_percent' => 5],
            ['name' => 'Nia Clarke', 'email' => 'nia@example.com', 'membership_tier' => 'gold', 'discount_percent' => 10],
            ['name' => 'Daniel Grant', 'email' => 'daniel@example.com', 'membership_tier' => 'silver', 'discount_percent' => 5],
            ['name' => 'Sofia Williams', 'email' => 'sofia@example.com', 'membership_tier' => 'platinum', 'discount_percent' => 15],
        ];

        $customerUsers = collect($customers)->map(
            fn (array $customer): User => User::updateOrCreate(
                ['email' => $customer['email']],
                [
                    'name' => $customer['name'],
                    'password' => 'password',
                    'usertype' => 'user',
                    'membership_tier' => $customer['membership_tier'],
                    'discount_percent' => $customer['discount_percent'],
                    'email_verified_at' => now(),
                ],
            ),
        );

        $reviewContent = [
            ['rating' => 5, 'comment' => 'The team explained the options clearly and the installation was completed neatly.'],
            ['rating' => 4, 'comment' => 'A helpful solution with a smooth consultation and clear pricing.'],
            ['rating' => 5, 'comment' => 'The system has made our energy planning much easier. Excellent service.'],
            ['rating' => 4, 'comment' => 'Professional support from the first assessment through the final setup.'],
            ['rating' => 5, 'comment' => 'The product matched the description and arrived ready for the next step.'],
        ];

        $equipment = Equipmentrental::query()->oldest('id')->limit(2)->get();

        foreach ($customerUsers as $index => $customer) {
            foreach ($equipment as $product) {
                Review::updateOrCreate(
                    [
                        'equipmentrental_id' => $product->id,
                        'user_id' => $customer->id,
                    ],
                    $reviewContent[$index],
                );
            }
        }
    }
}
