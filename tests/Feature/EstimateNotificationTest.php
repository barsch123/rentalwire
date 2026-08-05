<?php

use App\Livewire\Components\CartCount;
use App\Livewire\RentalFilters;
use App\Mail\OrderInvoice;
use App\Models\Equipmentrental;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
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
        ->assertSee('Bitcoin')
        ->assertSee('Do you have a promo code?')
        ->assertSee('Hybrid Solar Kit')
        ->assertSee('View summary')
        ->assertSee('Order Summary')
        ->assertSee('Log In to Continue');
});

test('authenticated checkout pre-fills and locks the customer name and email', function () {
    $user = User::factory()->create([
        'name' => 'Marcus Campbell',
        'email' => 'marcus@example.com',
    ]);
    $solution = Equipmentrental::factory()->create();

    session()->put('cart', [$solution->toArray()]);

    $this->actingAs($user)
        ->get(route('checkout'))
        ->assertSuccessful()
        ->assertSee('value="Marcus"', false)
        ->assertSee('value="Campbell"', false)
        ->assertSee('value="marcus@example.com"', false)
        ->assertSee('Promo code applied: MEMBER-STANDARD', false)
        ->assertSee('Continue to checkout');
});

test('checkout applies membership pricing, tax, shipping, cash on delivery, and emails an invoice', function () {
    Mail::fake();

    $user = User::factory()->create([
        'membership_tier' => 'platinum',
        'discount_percent' => 15,
    ]);
    $solution = Equipmentrental::factory()->create(['price' => 100000]);

    session()->put('cart', [$solution->toArray()]);

    $this->actingAs($user)
        ->post(route('checkout.complete'), [
            'first_name' => 'Sofia',
            'last_name' => 'Williams',
            'email' => $user->email,
            'mobile_number' => '876-555-0100',
            'address' => '1 Solar Avenue',
            'city' => 'Kingston',
            'parish' => 'St. Andrew',
            'postal_code' => '00000',
            'payment_method' => 'cash_on_delivery',
            'promo_code' => 'MEMBER-PLATINUM',
        ])
        ->assertRedirect(route('checkout'));

    Mail::assertSent(OrderInvoice::class, function (OrderInvoice $invoice) use ($user): bool {
        $renderedInvoice = $invoice->render();

        return $invoice->hasTo($user->email)
            && str_contains($renderedInvoice, 'Solara order invoice')
            && str_contains($renderedInvoice, 'Cash on delivery')
            && $invoice->order['payment_method'] === 'Cash on delivery'
            && $invoice->order['totals']['discount'] === 15000.0
            && $invoice->order['totals']['shipping'] === 1500.0
            && $invoice->order['totals']['tax'] === 2975.0
            && $invoice->order['totals']['total'] === 89475.0;
    });

    expect($user->fresh()->delivery_address)->toBe('1 Solar Avenue')
        ->and($user->fresh()->delivery_city)->toBe('Kingston')
        ->and($user->fresh()->delivery_mobile_number)->toBe('876-555-0100');

    $this->get(route('checkout'))
        ->assertSee('value="1 Solar Avenue"', false)
        ->assertSee('value="Kingston"', false)
        ->assertSee('value="876-555-0100"', false);

    expect(session('cart', []))->toBeEmpty();
});

test('checkout accepts bitcoin payments', function () {
    Mail::fake();

    $user = User::factory()->create();
    $solution = Equipmentrental::factory()->create(['price' => 100000]);

    session()->put('cart', [$solution->toArray()]);

    $this->actingAs($user)
        ->post(route('checkout.complete'), [
            'first_name' => 'Test',
            'last_name' => 'Customer',
            'email' => $user->email,
            'mobile_number' => '876-555-0199',
            'address' => '1 Solar Avenue',
            'city' => 'Kingston',
            'parish' => 'St. Andrew',
            'postal_code' => '00000',
            'payment_method' => 'bitcoin',
        ])
        ->assertRedirect(route('checkout'));

    Mail::assertSent(OrderInvoice::class, function (OrderInvoice $invoice): bool {
        return $invoice->order['payment_method'] === 'Bitcoin';
    });
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
