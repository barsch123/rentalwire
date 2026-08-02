<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.base')]
class Dashboard extends Component
{
    public $user;

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function removeFromWishlist(int $equipmentId): void
    {
        $this->user->wishlist()->detach($equipmentId);
    }

    public function render(): View
    {
        $wishlist = $this->user->wishlist()->latest('equipmentrental_user.created_at')->get();
        $reviews = $this->user->reviews()->with('equipment')->latest()->limit(3)->get();
        $estimateItems = collect(session('cart', []));

        return view('livewire.user.dashboard', [
            'wishlist' => $wishlist,
            'reviews' => $reviews,
            'estimateItems' => $estimateItems,
            'estimateTotal' => $estimateItems->sum(fn (array $item): float => (float) $item['price'] * (int) ($item['quantity'] ?? 1)),
        ]);
    }
}
