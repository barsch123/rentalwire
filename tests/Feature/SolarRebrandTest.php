<?php

use App\Livewire\RentalFilters;
use App\Models\Equipmentrental;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('public pages present the solar solutions brand', function () {
    $solution = Equipmentrental::factory()->create([
        'name' => 'Residential Solar Starter Kit',
        'description' => 'Rooftop solar panels with hybrid inverter and battery-ready monitoring.',
        'category' => 'Complete Solar Kits',
        'subcategory' => 'Grid-Tied Kits',
    ]);

    $this->get('/')
        ->assertSuccessful()
        ->assertSee('Power your home with more predictable energy')
        ->assertSee('Battery backup')
        ->assertSee('cf-container')
        ->assertSee('Solara')
        ->assertSee('Privacy Policy')
        ->assertSee('Terms and Conditions')
        ->assertSee('Solara respects your privacy')
        ->assertSee('These terms govern your use of the Solara website')
        ->assertSee('VIEW OUR')
        ->assertSee('SOLUTIONS');

    $this->get(route('about'))
        ->assertSuccessful()
        ->assertSee('Energy independence, designed for real life.')
        ->assertSee('From first question to dependable power.')
        ->assertSee('Talk to Solara');

    $this->get('/solutions')
        ->assertSuccessful()
        ->assertSee('Recent Searches')
        ->assertSee('Filter')
        ->assertSee('Residential Solar Starter Kit')
        ->assertSee('Add to Estimate');

    $this->get(route('solution-details', ['slug' => $solution->slug]))
        ->assertSuccessful()
        ->assertSee('Product details')
        ->assertSee('Add to estimate');

    $this->post(route('solutions.estimate.store', ['slug' => $solution->slug]))
        ->assertRedirect(route('checkout'));

    $this->post(route('solutions.estimate.store', ['slug' => $solution->slug]))
        ->assertRedirect(route('checkout'));

    $cart = session('cart');

    expect($cart)->toHaveCount(1)
        ->and($cart[0]['name'])->toBe('Residential Solar Starter Kit')
        ->and($cart[0]['quantity'])->toBe(2);

    $this->get('/rentals')->assertRedirect('/solutions');
    $this->get('/solution')->assertRedirect('/solutions');
    $this->get('/checkout')->assertRedirect('/estimate');
});

test('admin solution manager renders redesigned controls', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    Equipmentrental::factory()->create([
        'name' => 'Commercial Solar Array',
        'category' => 'Solar Panels',
        'subcategory' => 'Bifacial Panels',
    ]);

    $this->actingAs($admin)
        ->get(route('solutions.index'))
        ->assertSuccessful()
        ->assertSee('Add solar offering')
        ->assertSee('Catalog manager')
        ->assertSee('Commercial Solar Array');
});

test('solution explorer filters category price reset and sorting', function () {
    Equipmentrental::factory()->create([
        'name' => 'Residential Kit',
        'description' => 'Compact rooftop package for a family home.',
        'category' => 'Complete Solar Kits',
        'subcategory' => 'Grid-Tied Kits',
        'price' => 500000,
    ]);

    Equipmentrental::factory()->create([
        'name' => 'Commercial Array',
        'description' => 'High-output panel array for commercial facilities.',
        'category' => 'Solar Panels',
        'subcategory' => 'Bifacial Panels',
        'price' => 2000000,
    ]);

    Equipmentrental::factory()->create([
        'name' => 'Battery Backup',
        'description' => 'Battery storage for essential loads and outages.',
        'category' => 'Battery Storage',
        'subcategory' => 'Home Batteries',
        'price' => 800000,
    ]);

    Livewire::test(RentalFilters::class)
        ->set('tempSelectedCategory', 'Solar Panels')
        ->assertSet('subcategories', ['Monocrystalline Panels', 'Bifacial Panels', 'Flexible Panels'])
        ->set('tempSelectedSubcategory', 'Bifacial Panels')
        ->call('applyFilters')
        ->assertSee('Commercial Array')
        ->assertDontSee('Residential Kit')
        ->assertDontSee('Battery Backup')
        ->call('resetFilters')
        ->assertSet('selectedCategory', null)
        ->assertSet('selectedSubcategory', null)
        ->assertSee('Residential Kit')
        ->assertSee('Commercial Array')
        ->set('tempMinPrice', 900000)
        ->set('tempMaxPrice', 100000)
        ->call('applyFilters')
        ->assertSet('minPrice', 100000.0)
        ->assertSet('maxPrice', 900000.0)
        ->assertSee('Residential Kit')
        ->assertSee('Battery Backup')
        ->assertDontSee('Commercial Array')
        ->call('resetFilters')
        ->set('tempSortOption', 'priceLowHigh')
        ->call('applyFilters')
        ->assertSeeInOrder(['Residential Kit', 'Battery Backup', 'Commercial Array'])
        ->set('search', 'Battery')
        ->call('$refresh')
        ->assertSee('Battery Backup')
        ->assertDontSee('Residential Kit')
        ->assertDontSee('Commercial Array');
});
