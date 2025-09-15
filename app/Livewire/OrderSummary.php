<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderSummary extends Component
{
    public $name, $email;

    public array $cart = [];
    public float $total;
    protected $listeners = ['cartUpdated' => 'refreshCart'];
    public function render()
    {
                $this->calculateCart();

        return view('livewire.order-summary');
    }

    public function refreshCart(){
        $this->cart = session()->get('cart', []);
    }

    public function calculateCart(){
       $this->total = 0;

       foreach($this->cart as $item){
           $this->total += $item['price'];
       }
    }
    public function mount(){
        $this->auth = Auth::user();
        $this->name = $this->auth->name;
        $this->email = $this->auth->email;
        $this->cart = session()->get('cart', []);
    }
}
