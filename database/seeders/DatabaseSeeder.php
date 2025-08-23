<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blogs;
use App\Models\Product;
use App\Models\Newsletter;
use App\Models\Equipmentrental;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Equipmentrental::factory(10)->create();
        Newsletter::factory(1)->create();
        Product::factory(50)->create();

        // Create tags first
        $tagNames = [
            'Heavy Equipment',
            'Construction Tips',
            'Equipment Rental',
            'Industry',
            'Industry Insights',
            'Project Success Stories',
            'Maintenance',
            'Safety',
            'Technology',
            'Sustainability'
        ];

        $tags = collect($tagNames)->map(function ($name) {
            return Tag::firstOrCreate(['name' => $name]);
        });

        // Create blogs and attach random tags
        Blogs::factory(10)->create()->each(function ($blog) use ($tags) {
            $blog->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'usertype' => 'admin'
        ]);
    }
}
