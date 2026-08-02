<?php

use App\Livewire\OrderSummary;
use App\Livewire\ProductEngagement;
use App\Livewire\RentalFilters;
use App\Livewire\SupportCenter;
use App\Models\Equipmentrental;
use App\Models\Review;
use App\Models\SupportRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('catalog shows item availability pictures and details with related products', function () {
    $equipment = Equipmentrental::factory()->create([
        'name' => 'Available Roof Array',
        'category' => 'Solar Panels',
        'photo' => 'https://example.com/array.jpg',
        'stock_quantity' => 2,
    ]);
    Equipmentrental::factory()->create([
        'name' => 'Related Solar Array',
        'category' => 'Solar Panels',
    ]);

    $this->get(route('rental-details', $equipment->slug))
        ->assertSuccessful()
        ->assertSee('Available for estimate')
        ->assertSee('2 allocation slots remaining')
        ->assertSee('https://example.com/array.jpg', false)
        ->assertSee($equipment->description)
        ->assertSee('Related Solar Array');
});

test('unavailable items cannot be added to the shopping cart', function () {
    $equipment = Equipmentrental::factory()->create([
        'availability_status' => 'unavailable',
        'stock_quantity' => 0,
    ]);

    Livewire::test(RentalFilters::class)->call('addToCart', $equipment->id);

    expect(session('cart', []))->toBeEmpty();

    $this->post(route('solutions.estimate.store', $equipment->slug))->assertUnprocessable();
});

test('customers can maintain a wishlist and one review per item', function () {
    $user = User::factory()->create();
    $equipment = Equipmentrental::factory()->create();

    Livewire::actingAs($user)
        ->test(ProductEngagement::class, ['equipment' => $equipment])
        ->call('toggleWishlist')
        ->set('rating', 4)
        ->set('comment', 'Clear advice and a professional site assessment.')
        ->call('saveReview')
        ->set('rating', 5)
        ->set('comment', 'The updated installation proposal was very thorough.')
        ->call('saveReview');

    expect($user->wishlist()->whereKey($equipment)->exists())->toBeTrue()
        ->and(Review::query()->whereBelongsTo($user)->where('equipmentrental_id', $equipment->id)->count())->toBe(1)
        ->and(Review::query()->first()->rating)->toBe(5);

    $this->actingAs($user)->get(route('dashboard'))
        ->assertSuccessful()
        ->assertSee('Your wishlist')
        ->assertSee($equipment->name);
});

test('customers can toggle their wishlist directly from a catalog card', function () {
    $user = User::factory()->create();
    $equipment = Equipmentrental::factory()->create(['name' => 'Card Wishlist System']);

    Livewire::actingAs($user)
        ->test(RentalFilters::class)
        ->assertSee('Save to wishlist')
        ->call('toggleWishlist', $equipment->id)
        ->assertSee('Remove from wishlist')
        ->call('toggleWishlist', $equipment->id)
        ->assertSee('Save to wishlist');

    expect($user->wishlist()->whereKey($equipment)->exists())->toBeFalse();
});

test('membership discount is included in the estimate summary', function () {
    $user = User::factory()->create(['membership_tier' => 'gold', 'discount_percent' => 10]);
    $equipment = Equipmentrental::factory()->create(['price' => 100000]);

    Livewire::actingAs($user)->test(RentalFilters::class)->call('addToCart', $equipment->id);

    Livewire::actingAs($user)
        ->test(OrderSummary::class)
        ->assertSet('total', 100000.0)
        ->assertSet('discount', 10000.0)
        ->assertSee('Gold member');
});

test('support center searches feedback and stores email issues and mailing list preferences', function () {
    Livewire::test(SupportCenter::class)
        ->set('search', 'membership')
        ->assertSee('How do membership discounts work?')
        ->assertDontSee('How do I request a solar estimate?')
        ->set('name', 'Jamie Customer')
        ->set('email', 'jamie@example.com')
        ->set('subject', 'Battery sizing question')
        ->set('message', 'Please help me choose the correct battery capacity.')
        ->set('joinMailingList', true)
        ->call('submit')
        ->assertHasNoErrors();

    expect(SupportRequest::query()->where('email', 'jamie@example.com')->exists())->toBeTrue();
    $this->assertDatabaseHas('newsletter', ['email' => 'jamie@example.com', 'status' => 'subscribed']);
});
