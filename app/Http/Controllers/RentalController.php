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
        $equipment = Equipmentrental::query()
            ->with(['reviews' => fn ($query) => $query->with('user')->latest()])
            ->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('slug', $slug)->firstOrFail();

        $relatedEquipment = Equipmentrental::query()
            ->whereKeyNot($equipment->id)
            ->where('category', $equipment->category)
            ->where('availability_status', 'available')
            ->limit(4)->get();

        return view('rentals.details', [
            'equipment' => $equipment,
            'relatedEquipment' => $relatedEquipment,
        ]);
    }

    public function addToEstimate(Request $request, string $slug): RedirectResponse
    {
        $equipment = Equipmentrental::where('slug', $slug)->firstOrFail();

        abort_unless($equipment->isAvailable(), 422, 'This solution is currently unavailable.');

        $cart = $request->session()->get('cart', []);
        $existingIndex = collect($cart)->search(
            fn (array $item): bool => (int) ($item['id'] ?? 0) === $equipment->id
        );

        if ($existingIndex === false) {
            $cart[] = [...$equipment->toArray(), 'quantity' => 1, 'discount_percent' => (int) ($request->user()?->discount_percent ?? 0)];
        } else {
            $cart[$existingIndex]['quantity'] = (int) ($cart[$existingIndex]['quantity'] ?? 1) + 1;
        }

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('checkout')
            ->with('message', "{$equipment->name} was added to your estimate.");
    }
}
