<?php

namespace App\Http\Controllers;

use App\CartTotals;
use App\Mail\OrderInvoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        return view('checkout');
    }

    public function complete(Request $request, CartTotals $cartTotals): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:40'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'parish' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:30'],
            'payment_method' => ['required', 'in:card,paypal,cash_on_delivery,bitcoin'],
            'promo_code' => ['nullable', 'string', 'max:50'],
        ]);
        $authenticatedUser = $request->user();

        if ($authenticatedUser) {
            $nameParts = preg_split('/\s+/', trim($authenticatedUser->name)) ?: [];
            $validated['first_name'] = $nameParts[0] ?? $authenticatedUser->name;
            $validated['last_name'] = implode(' ', array_slice($nameParts, 1));
            $validated['email'] = $authenticatedUser->email;
        }

        $cart = $request->session()->get('cart', []);

        if ($cart === []) {
            return redirect()->route('checkout')->with('error', 'Add at least one product before checking out.');
        }

        $totals = $cartTotals->calculate($cart, $request->user());
        $items = collect($cart)->map(fn (array $item): array => [
            'name' => $item['name'],
            'quantity' => max(1, (int) ($item['quantity'] ?? 1)),
            'line_total' => (float) $item['price'] * max(1, (int) ($item['quantity'] ?? 1)),
        ])->all();
        $orderNumber = 'SOL-'.strtoupper(Str::random(8));

        Mail::to($validated['email'])->send(new OrderInvoice([
            'number' => $orderNumber,
            'customer_name' => $validated['first_name'].' '.$validated['last_name'],
            'payment_method' => match ($validated['payment_method']) {
                'cash_on_delivery' => 'Cash on delivery',
                'bitcoin' => 'Bitcoin',
                default => ucfirst($validated['payment_method']),
            },
            'items' => $items,
            'totals' => $totals,
        ]));

        if ($authenticatedUser) {
            $authenticatedUser->update([
                'delivery_first_name' => $validated['first_name'],
                'delivery_last_name' => $validated['last_name'],
                'delivery_mobile_number' => $validated['mobile_number'],
                'delivery_address' => $validated['address'],
                'delivery_city' => $validated['city'],
                'delivery_parish' => $validated['parish'],
                'delivery_postal_code' => $validated['postal_code'],
            ]);
        }

        $request->session()->forget('cart');

        return redirect()->route('checkout')->with([
            'order_completed' => true,
            'order_number' => $orderNumber,
            'invoice_email' => $validated['email'],
        ]);
    }
}
