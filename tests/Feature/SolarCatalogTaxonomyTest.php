<?php

use App\Livewire\Admin\Adminupload;
use App\Livewire\RentalFilters;
use App\Models\Equipmentrental;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('catalog exposes only the configured solar taxonomy', function () {
    Equipmentrental::factory()->create([
        'category' => 'Solar Panels',
        'subcategory' => 'Bifacial Panels',
    ]);

    Equipmentrental::factory()->create([
        'category' => 'Dozers',
        'subcategory' => 'Bulldozer',
    ]);

    Livewire::test(RentalFilters::class)
        ->assertSet('categories', array_keys(config('solar.catalog')))
        ->assertSee('Solar Panels')
        ->assertDontSee('Dozers')
        ->call('selectCategory', 'Solar Panels')
        ->assertSet('selectedCategory', 'Solar Panels')
        ->assertSet('subcategories', ['Monocrystalline Panels', 'Bifacial Panels', 'Flexible Panels'])
        ->assertSee('Bifacial Panels')
        ->assertDontSee('Bulldozer');
});

test('admin rejects categories and subcategories outside the solar taxonomy', function () {
    Livewire::test(Adminupload::class)
        ->set('category', 'Dozers')
        ->set('subcategory', 'Bulldozer')
        ->call('save')
        ->assertHasErrors(['category', 'subcategory']);

    Livewire::test(Adminupload::class)
        ->set('category', 'Solar Panels')
        ->set('subcategory', 'Home Batteries')
        ->call('save')
        ->assertHasErrors(['subcategory']);
});
