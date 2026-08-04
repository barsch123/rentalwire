<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guest authentication pages provide a home navigation button', function (string $route) {
    $this->get(route($route))
        ->assertSuccessful()
        ->assertSee('href="'.route('welcome').'"', false)
        ->assertSee('Home');
})->with([
    'login',
    'register',
]);

test('confirm password provides a home navigation button', function () {
    $this->actingAs(User::factory()->create())
        ->get(route('password.confirm'))
        ->assertSuccessful()
        ->assertSee('href="'.route('welcome').'"', false)
        ->assertSee('Home');
});
