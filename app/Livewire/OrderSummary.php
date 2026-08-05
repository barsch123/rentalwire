<?php

namespace App\Livewire;

use App\CartTotals;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class OrderSummary extends Component
{
    public $name;

    public $email;

    public $contact = '';

    public array $cart = [];

    public float $total = 0;

    public float $discount = 0;

    public float $shipping = 0;

    public float $tax = 0;

    public float $grandTotal = 0;

    public ?string $promoCode = null;

    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function render(): View
    {
        $this->calculateCart();

        return view('livewire.order-summary');
    }

    public function refreshCart(): void
    {
        $this->cart = session()->get('cart', []);
    }

    public function calculateCart(): void
    {
        $totals = app(CartTotals::class)->calculate($this->cart, Auth::user());

        $this->total = $totals['subtotal'];
        $this->discount = $totals['discount'];
        $this->shipping = $totals['shipping'];
        $this->tax = $totals['tax'];
        $this->grandTotal = $totals['total'];
        $this->promoCode = $totals['promo_code'];
    }

    public function mount(): void
    {
        $user = Auth::user();
        $this->name = $user->name ?? 'No name provided';
        $this->email = $user->email ?? 'No email provided';
        $this->cart = session()->get('cart', []);
    }
}
