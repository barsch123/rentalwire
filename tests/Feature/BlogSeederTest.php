<?php

use App\Models\Blogs;
use Database\Seeders\BlogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('blog seeder creates generated Solara articles with tags', function () {
    $this->seed(BlogSeeder::class);

    expect(Blogs::query()->count())->toBe(6);

    $article = Blogs::query()->where('slug', 'how-to-choose-the-right-solar-system-for-your-home')->firstOrFail();

    expect($article->title)->toBe('How to Choose the Right Solar System for Your Home')
        ->and($article->content)->toContain('<h2>Start with your daily energy pattern</h2>')
        ->and($article->tags->pluck('name')->all())->toContain('Solar Energy', 'Renewable Insights');
});

test('blog seeder can be run repeatedly without duplicate articles', function () {
    $this->seed(BlogSeeder::class);
    $this->seed(BlogSeeder::class);

    expect(Blogs::query()->count())->toBe(6)
        ->and(Blogs::query()->where('slug', 'a-practical-guide-to-preparing-your-roof-for-solar')->value('blog_photo'))->toBe('img/blog/roof-preparation.png')
        ->and(file_exists(public_path('img/blog/roof-preparation.png')))->toBeTrue();
});
