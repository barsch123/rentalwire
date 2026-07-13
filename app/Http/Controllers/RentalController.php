<?php

namespace App\Http\Controllers;

use App\Models\Equipmentrental;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentalController extends Controller
{
    public function index(): View
    {
        return view('rentals.rentals');
    }

    public function show(string $slug): View
    {
        $equipment = Equipmentrental::where('slug', $slug)->firstOrFail();

        return view('rentals.details', [
            'equipment' => $equipment,
        ]);
    }

    public function addToEstimate(Request $request, string $slug): RedirectResponse
    {
        $equipment = Equipmentrental::where('slug', $slug)->firstOrFail();

        $cart = $request->session()->get('cart', []);
        $existingIndex = collect($cart)->search(
            fn (array $item): bool => (int) ($item['id'] ?? 0) === $equipment->id
        );

        if ($existingIndex === false) {
            $cart[] = [...$equipment->toArray(), 'quantity' => 1];
        } else {
            $cart[$existingIndex]['quantity'] = (int) ($cart[$existingIndex]['quantity'] ?? 1) + 1;
        }

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('checkout')
            ->with('message', "{$equipment->name} was added to your estimate.");
    }
}
