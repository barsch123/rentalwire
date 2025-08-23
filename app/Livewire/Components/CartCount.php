<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartCount extends Component
{
    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public $count = 0;

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $this->count = count(Session::get('cart', []));
    }

    public function render()
    {
        return view('livewire.components.cart-count');
    }
}
