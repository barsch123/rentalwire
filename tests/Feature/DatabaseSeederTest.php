<?php

use App\Models\Equipmentrental;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('database seeder creates repeatable test user and admin accounts', function () {
    $this->seed();
    $this->seed();

    expect(User::query()->where('email', 'test@example.com')->count())->toBe(1)
        ->and(User::query()->where('email', 'admin@example.com')->count())->toBe(1)
        ->and(User::query()->whereIn('email', [
            'alicia@example.com',
            'marcus@example.com',
            'nia@example.com',
            'daniel@example.com',
            'sofia@example.com',
        ])->count())->toBe(5)
        ->and(Review::query()->count())->toBe(10)
        ->and(Equipmentrental::query()->whereIn('category', array_keys(config('solar.catalog')))->select('category')->distinct()->count())->toBe(10)
        ->and(Equipmentrental::query()->whereIn('category', array_keys(config('solar.catalog')))->pluck('photo')->every(fn (string $photo): bool => file_exists(public_path($photo))))->toBeTrue();

    $user = User::query()->where('email', 'test@example.com')->firstOrFail();
    $admin = User::query()->where('email', 'admin@example.com')->firstOrFail();

    expect($user->usertype)->toBe('user')
        ->and($admin->usertype)->toBe('admin')
        ->and(Hash::check('password', $user->password))->toBeTrue()
        ->and(Hash::check('password', $admin->password))->toBeTrue()
        ->and(Review::query()->whereBelongsTo($user, 'user')->count())->toBe(0)
        ->and(Review::query()->whereBelongsTo(User::query()->where('email', 'alicia@example.com')->firstOrFail(), 'user')->count())->toBe(2);
});
