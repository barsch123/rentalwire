<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(10, true),
            'slug' => \Illuminate\Support\Str::slug($title . '-' . $this->faker->unique()->numberBetween(1000, 9999)),
            'published_at' => $this->faker->dateTimeThisYear(),
            'modified_at' => $this->faker->dateTimeThisYear(),
            'blog_photo' => $this->faker->imageUrl(640, 480, 'business', true),
        ];
    }
}
