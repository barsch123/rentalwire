<?php

namespace App;

use App\Models\User;

class CartTotals
{
    /**
     * @param  array<int, array{price: int|float|string, quantity?: int}>  $cart
     * @return array{subtotal: float, discount: float, discount_percent: int, shipping: float, tax: float, total: float, promo_code: ?string}
     */
    public function calculate(array $cart, ?User $user = null): array
    {
        $subtotal = collect($cart)->sum(
            fn (array $item): float => (float) $item['price'] * max(1, (int) ($item['quantity'] ?? 1))
        );
        $discountPercent = max(0, min(100, (int) ($user?->discount_percent ?? 0)));
        $discount = round($subtotal * ($discountPercent / 100), 2);
        $discountedSubtotal = max(0, $subtotal - $discount);
        $shipping = $subtotal > 0 ? (float) config('commerce.shipping_fee') : 0.0;
        $tax = round($discountedSubtotal * (float) config('commerce.tax_rate'), 2);

        return [
            'subtotal' => round($subtotal, 2),
            'discount' => $discount,
            'discount_percent' => $discountPercent,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => round($discountedSubtotal + $tax + $shipping, 2),
            'promo_code' => $discountPercent > 0
                ? 'MEMBER-'.strtoupper((string) ($user?->membership_tier ?? 'standard'))
                : null,
        ];
    }
}
