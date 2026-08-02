<?php

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
        ->assertSee('Manage solutions')
        ->assertSee('Manage blogs')
        ->assertDontSee('Customer account')
        ->assertDontSee('Catalog manager');
});

test('users are redirected away from the admin dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertRedirect(route('dashboard'));
});
