<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartItems extends Component
{
    public $cart = [];
    public $selectedItems = [];
    public $total = 0;
    public function mount()
    {
        $this->cart = Session::get('cart', []);
    }

    public function removeFromCart($index)
    {
        unset($this->cart[$index]);
        $this->cart = array_values($this->cart); // Re-index the array
        Session::put('cart', $this->cart);
        $this->dispatch('cartUpdated');

        $this->selectedItems = array_diff($this->selectedItems, [$index]);
    }

    public function removeSelectedItems()
    {
        foreach ($this->selectedItems as $index) {
            unset($this->cart[$index]);
        }
        $this->cart = array_values($this->cart); // Re-index the array
        Session::put('cart', $this->cart);
        $this->dispatch('cartUpdated');
        $this->selectedItems = [];
    }


    public function removeAllItems()
    {
        $this->cart = [];
        Session::put('cart', []);
        $this->dispatch('cartUpdated');
        $this->selectedItems = [];
    }

    public function selectAllItems()
    {
        $this->selectedItems = array_keys($this->cart);
    }

    public function deselectAllItems()
    {
        $this->selectedItems = [];
    }
    public function render()
    {
        return view('livewire.cart-items');
    }
}
