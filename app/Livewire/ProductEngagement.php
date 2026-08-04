<?php

namespace App\Livewire;

use App\Models\Equipmentrental;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class ProductEngagement extends Component
{
    public Equipmentrental $equipment;

    public int $rating = 5;

    public string $comment = '';

    public bool $reviewsOnly = false;

    public function mount(Equipmentrental $equipment, bool $reviewsOnly = false): void
    {
        $this->equipment = $equipment;
        $this->reviewsOnly = $reviewsOnly;

        if ($review = Auth::user()?->reviews()->whereBelongsTo($equipment, 'equipment')->first()) {
            $this->rating = $review->rating;
            $this->comment = $review->comment;
        }
    }

    public function toggleWishlist(): void
    {
        abort_unless(Auth::check(), 401);
        Auth::user()->wishlist()->toggle($this->equipment->id);
        Flux::toast(text: 'Your wishlist has been updated.', variant: 'success');
    }

    public function saveReview(): void
    {
        abort_unless(Auth::check(), 401);

        $validated = $this->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['required', 'string', 'min:10', 'max:1000'],
        ]);

        Auth::user()->reviews()->updateOrCreate(
            ['equipmentrental_id' => $this->equipment->id],
            $validated,
        );

        $this->equipment->load(['reviews' => fn ($query) => $query->with('user')->latest()])->loadCount('reviews')->loadAvg('reviews', 'rating');
        Flux::toast(text: 'Thank you for sharing your experience.', heading: 'Review saved', variant: 'success');
    }

    public function render(): View
    {
        $isWishlisted = Auth::user()?->wishlist()->whereKey($this->equipment->id)->exists() ?? false;

        return view('livewire.product-engagement', compact('isWishlisted'));
    }
}
