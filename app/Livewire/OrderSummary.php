<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderSummary extends Component
{
    public $name;

    public $email;

    public $contact = '';

    public array $cart = [];

    public float $total = 0;

    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function render()
    {
        $this->calculateCart();

        return view('livewire.order-summary');
    }

    public function refreshCart()
    {
        $this->cart = session()->get('cart', []);
    }

    public function calculateCart()
    {
        $this->total = 0;

        foreach ($this->cart as $item) {
            $this->total += $item['price'] * ($item['quantity'] ?? 1);
        }
    }

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name ?? 'No name provided';
        $this->email = $user->email ?? 'No email provided';
        $this->cart = session()->get('cart', []);
    }
}
