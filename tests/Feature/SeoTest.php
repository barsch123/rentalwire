<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('public pages render complete seo metadata', function () {
    $response = $this->get(route('welcome'));

    $response->assertSuccessful()
        ->assertSee('<title>Solar Energy Solutions for Jamaica | Solara</title>', false)
        ->assertSee('<meta name="description" content="Solara makes dependable solar power, battery backup, and energy management easier for Jamaican homes and businesses.">', false)
        ->assertSee('<meta property="og:title" content="Solar Energy Solutions for Jamaica | Solara">', false)
        ->assertSee('<meta property="og:image" content="'.asset('img/logo.svg').'">', false)
        ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
        ->assertSee('<link rel="canonical" href="'.url('/').'">', false);
});

test('admin pages do not render seo metadata', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertSuccessful()
        ->assertDontSee('<meta name="description"', false)
        ->assertDontSee('<meta property="og:title"', false)
        ->assertDontSee('<link rel="canonical"', false);
});
