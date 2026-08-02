@php
    $shipping = 0;
    $tax = 0;
    $grandTotal = $total - $discount + $shipping + $tax;
@endphp

<section class="bg-white">
    <h2 class="text-2xl font-bold text-neutral-950">Order Summary</h2>

    @if (! empty($cart))
        <div class="mt-6 space-y-3 border-b border-neutral-200 pb-5">
            @foreach ($cart as $item)
                <div class="flex justify-between gap-4 text-base">
                    <span class="min-w-0 truncate text-neutral-600">
                        {{ $item['name'] }}
                        <span class="text-neutral-400">x {{ $item['quantity'] ?? 1 }}</span>
                    </span>
                    <span class="shrink-0 font-semibold text-neutral-950">
                        ${{ number_format($item['price'] * ($item['quantity'] ?? 1), 0) }}
                    </span>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-6 border-b border-neutral-200 pb-5 text-base leading-7 text-neutral-500">Add at least one product to continue.</p>
    @endif

    <dl class="mt-5 space-y-4 text-base">
        <div class="flex items-center justify-between gap-4">
            <dt class="text-neutral-600">Subtotal</dt>
            <dd class="font-semibold text-neutral-950">${{ number_format($total, 0) }}</dd>
        </div>
        <div class="flex items-center justify-between gap-4">
            <dt class="text-neutral-600">Membership discount</dt>
            <dd class="font-semibold text-neutral-950">${{ number_format($discount, 0) }}</dd>
        </div>
        <div class="flex items-center justify-between gap-4">
            <dt class="text-neutral-600">Shipping</dt>
            <dd class="font-semibold text-neutral-950">${{ number_format($shipping, 0) }}</dd>
        </div>
        <div class="flex items-center justify-between gap-4">
            <dt class="text-neutral-600">Tax</dt>
            <dd class="font-semibold text-neutral-950">${{ number_format($tax, 0) }}</dd>
        </div>
    </dl>

    @auth
        <p class="mt-4 text-xs text-neutral-500">{{ ucfirst(Auth::user()->membership_tier) }} member · {{ Auth::user()->discount_percent }}% eligible discount</p>
    @endauth

    <div class="mt-5 flex items-center justify-between border-t border-neutral-300 pt-5 text-base">
        <span class="font-bold text-neutral-950">Total</span>
        <strong class="text-lg font-bold text-neutral-950">${{ number_format($grandTotal, 0) }}</strong>
    </div>

    @if (Auth::check())
        <button type="button" x-on:click="step = 3; summaryOpen = false; window.scrollTo({ top: 0, behavior: 'smooth' })" @disabled(empty($cart))
            class="mt-6 w-full rounded-md bg-neutral-950 px-5 py-3 text-base font-semibold text-white transition hover:bg-neutral-800 disabled:cursor-not-allowed disabled:bg-neutral-300">
            Pay now
        </button>
    @else
        <flux:button :href="route('login')" wire:navigate variant="primary" class="mt-6 w-full rounded-md! py-5!">
            Log In to Continue
        </flux:button>
    @endif
</section>
