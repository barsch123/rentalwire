<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guest mobile account card links to login and signup access', function () {
    $this->get(route('welcome'))
        ->assertSuccessful()
        ->assertSee('Sign in or sign up to manage your account')
        ->assertSee('href="'.route('login').'"', false)
        ->assertSee('Sign in / Sign up');
});

test('header uses a shopping cart trigger for the estimate', function () {
    $this->get(route('welcome'))
        ->assertSuccessful()
        ->assertSee('aria-label="Open shopping cart"', false);
});

test('footer uses livewire navigation for solar solutions', function () {
    $this->get(route('welcome'))
        ->assertSuccessful()
        ->assertSee('href="'.route('solutions').'" wire:navigate', false);
});

test('footer language selection persists spanish for the next request', function () {
    $this->withSession(['locale' => 'es'])
        ->followingRedirects()
        ->get(route('welcome'))
        ->assertSuccessful()
        ->assertSee('Empresa')
        ->assertSee('Soluciones solares');
});
