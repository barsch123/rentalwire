<?php

namespace App\Http\Controllers;

use App\Models\Equipmentrental;
use Illuminate\View\View;

class Welcome extends Controller
{
    public function index(): View
    {
        $featuredProducts = Equipmentrental::query()
            ->where('availability_status', 'available')
            ->withCount('reviews')
            ->oldest('id')
            ->limit(8)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }
}
