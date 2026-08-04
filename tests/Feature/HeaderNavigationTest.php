<?php

test('guest mobile account card links to login and signup access', function () {
    $this->get(route('welcome'))
        ->assertSuccessful()
        ->assertSee('Sign in or sign up to manage your account')
        ->assertSee('href="'.route('login').'"', false)
        ->assertSee('Sign in / Sign up');
});
