<?php

namespace Database\Seeders;

use App\Models\Equipmentrental;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Equipmentrental::factory(10)->create();
        Newsletter::factory(1)->create();
        Product::factory(50)->create();

        $this->call(BlogSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'usertype' => 'admin',
        ]);
    }
}
