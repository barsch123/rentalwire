<?php

namespace App\Livewire\Admin;

use App\Models\Equipmentrental;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(): View
    {
        $products = Equipmentrental::query()
            ->withCount('reviews')
            ->orderBy('name')
            ->get();

        return view('livewire.admin.dashboard', compact('products'));
    }
}
