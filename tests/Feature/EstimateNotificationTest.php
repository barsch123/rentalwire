<?php

use App\Livewire\Components\CartCount;
use App\Livewire\RentalFilters;
use App\Models\Equipmentrental;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('estimate notification center displays and removes current items', function () {
    $first = Equipmentrental::factory()->create([
        'name' => 'Bifacial Roof Array',
        'price' => 450000,
    ]);
    $second = Equipmentrental::factory()->create([
        'name' => 'Home Battery Reserve',
        'price' => 720000,
    ]);

    session()->put('cart', [$first->toArray(), $second->toArray()]);

    Livewire::test(CartCount::class)
        ->assertSet('count', 2)
        ->assertSet('total', 1170000.0)
        ->assertSee('Estimate')
        ->assertSee('Bifacial Roof Array')
        ->assertSee('Home Battery Reserve')
        ->call('removeItem', 0)
        ->assertSet('count', 1)
        ->assertSet('total', 720000.0)
        ->assertDontSee('Bifacial Roof Array')
        ->assertSee('Home Battery Reserve');

    expect(session('cart'))->toHaveCount(1)
        ->and(session('cart.0.name'))->toBe('Home Battery Reserve');
});

test('checkout presents the redesigned estimate workspace', function () {
    $solution = Equipmentrental::factory()->create([
        'name' => 'Hybrid Solar Kit',
    ]);

    session()->put('cart', [$solution->toArray()]);

    $this->get(route('checkout'))
        ->assertSuccessful()
        ->assertSee('x-data="delayedLoader"', false)
        ->assertSee('Selected solutions')
        ->assertSee('Continue to checkout')
        ->assertSee('Delivery Details')
        ->assertSee('Payment method')
        ->assertSee('Do you have a promo code?')
        ->assertSee('Hybrid Solar Kit')
        ->assertSee('View summary')
        ->assertSee('Order Summary')
        ->assertSee('Log In to Continue');
});

test('adding the same solution increases its quantity instead of adding another row', function () {
    $solution = Equipmentrental::factory()->create([
        'name' => 'Modular Home Battery',
        'price' => 500000,
    ]);

    Livewire::test(RentalFilters::class)
        ->call('addToCart', $solution->id)
        ->call('addToCart', $solution->id);

    expect(session('cart'))->toHaveCount(1)
        ->and(session('cart.0.id'))->toBe($solution->id)
        ->and(session('cart.0.quantity'))->toBe(2);

    Livewire::test(CartCount::class)
        ->assertSet('count', 2)
        ->assertSet('total', 1000000.0)
        ->assertSee('Qty 2');
});
