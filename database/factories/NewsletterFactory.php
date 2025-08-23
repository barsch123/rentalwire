<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newsletter>
 */
class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement(['subscribed', 'unsubscribed']),
            'verification_token' => fake()->optional()->sha256(),
            'last_email' => fake()->optional()->dateTimeThisYear(),
        ];
    }
}
