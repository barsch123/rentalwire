<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class newsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Newsletter::factory(1)->create();
    }
}
