<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('appearance settings display labeled color mode options', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('settings.appearance'))
        ->assertSuccessful()
        ->assertSee('name="appearance"', false)
        ->assertSee('<span class="text-sm font-semibold">Light</span>', false)
        ->assertSee('<span class="text-sm font-semibold">Dark</span>', false)
        ->assertSee('<span class="text-sm font-semibold">System</span>', false)
        ->assertSeeInOrder([
            'Color mode',
            'Light',
            'Dark',
            'System',
        ]);
});
