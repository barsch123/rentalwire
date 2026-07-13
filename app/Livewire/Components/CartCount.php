<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCount extends Component
{
    public $count = 0;

    public array $items = [];

    public float $total = 0;

    public function mount(): void
    {
        $this->refreshEstimate();
    }

    #[On('cartUpdated')]
    public function refreshEstimate(): void
    {
        $this->items = Session::get('cart', []);
        $this->count = (int) collect($this->items)->sum(
            fn (array $item): int => (int) ($item['quantity'] ?? 1)
        );
        $this->total = (float) collect($this->items)->sum(
            fn (array $item): float => (float) $item['price'] * (int) ($item['quantity'] ?? 1)
        );
    }

    public function removeItem(int $index): void
    {
        if (! array_key_exists($index, $this->items)) {
            return;
        }

        unset($this->items[$index]);
        Session::put('cart', array_values($this->items));
        $this->refreshEstimate();
        $this->dispatch('cartUpdated');
    }

    public function render(): View
    {
        return view('livewire.components.cart-count');
    }
}
