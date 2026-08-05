<?php

use App\Models\Equipmentrental;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/dashboard')
        ->assertSuccessful()
        ->assertSee('Customer account')
        ->assertSee('Your wishlist')
        ->assertSee('Current estimate')
        ->assertDontSee('livewire-starter-kit')
        ->assertDontSee('Repository')
        ->assertDontSee('Documentation');
});

test('administrators are redirected away from the user dashboard', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);

    $this->actingAs($admin)
        ->get(route('dashboard'))
        ->assertRedirect(route('admin.dashboard'));
});

test('administrators see an operations overview instead of customer or catalog management features', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertSuccessful()
        ->assertSee('Operations overview')
        ->assertSee('Published articles over the last six months')
        ->assertSee('data-admin-chart', false)
        ->assertSee('Product reviews')
        ->assertSee('data-product-review-chart', false)
        ->assertSee('Manage solutions')
        ->assertSee('Manage blogs')
        ->assertDontSee('Customer account')
        ->assertDontSee('Catalog manager');
});

test('administrators see the total reviews for each product', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);
    $reviewer = User::factory()->create();
    $reviewedProduct = Equipmentrental::factory()->create(['name' => 'Reviewed Solar Panel']);
    $unreviewedProduct = Equipmentrental::factory()->create(['name' => 'New Solar Fan']);

    Review::create([
        'equipmentrental_id' => $reviewedProduct->id,
        'user_id' => $reviewer->id,
        'rating' => 5,
        'comment' => 'Excellent product.',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertSuccessful()
        ->assertSee('Reviewed Solar Panel')
        ->assertSee('New Solar Fan')
        ->assertSee('1 total reviews');
});

test('users are redirected away from the admin dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertRedirect(route('dashboard'));
});

test('administrators cannot access customer settings', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);

    $this->actingAs($admin)
        ->get(route('settings.profile'))
        ->assertRedirect(route('admin.dashboard'));
});

test('customer navigation is not rendered in the admin workspace', function () {
    $admin = User::factory()->create(['usertype' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertDontSee('href="'.route('dashboard').'"', false)
        ->assertDontSee('href="'.route('settings.profile').'"', false);
});
