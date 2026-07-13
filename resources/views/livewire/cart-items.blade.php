<section class="space-y-5">
    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="text-sm font-black uppercase tracking-[0.2em] text-[#9a6700]">Your selection</p>
            <h2 class="mt-2 text-2xl font-bold tracking-tight sm:text-3xl">Selected solutions</h2>
            <p class="mt-1 text-base text-neutral-500">{{ count($cart ?? []) }} {{ Str::plural('item', count($cart ?? [])) }} in your review list</p>
        </div>
        @if (! empty($cart))
            <button wire:click="removeAllItems" class="rounded-full border border-neutral-300 px-4 py-2 text-sm font-bold text-neutral-600 transition hover:border-red-300 hover:bg-red-50 hover:text-red-700 data-loading:pointer-events-none data-loading:opacity-50">Clear all</button>
        @endif
    </div>

    @if (! empty($cart))
        <div class="space-y-4">
            @foreach ($cart as $index => $item)
                <article wire:key="checkout-item-{{ $item['id'] ?? $index }}-{{ $index }}" class="grid gap-4 rounded-2xl border border-neutral-200 bg-white p-4 transition hover:border-general sm:grid-cols-[6.5rem_minmax(0,1fr)_auto] sm:items-center sm:p-5">
                    <div class="relative overflow-hidden rounded-xl bg-neutral-100">
                        <img src="{{ Str::startsWith($item['photo'] ?? '', 'http') ? $item['photo'] : asset('storage/'.($item['photo'] ?? '')) }}" alt="{{ $item['name'] }}" class="aspect-square h-full w-full object-cover">
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-[#9a6700]">{{ $item['subcategory'] ?? 'Solar solution' }}</p>
                        <h3 class="mt-1 text-xl font-semibold leading-tight sm:text-2xl">{{ $item['name'] }}</h3>
                        <p class="mt-2 line-clamp-2 text-base leading-7 text-neutral-500">{{ $item['description'] ?? 'Selected for estimate review and final sizing.' }}</p>
                        <div class="mt-3 flex flex-wrap gap-2 text-sm font-bold uppercase tracking-wide text-neutral-500">
                            <span class="rounded-full bg-general/15 px-2.5 py-1 text-[#9a6700]">Qty {{ $item['quantity'] ?? 1 }}</span>
                            <span class="rounded-full bg-neutral-100 px-2.5 py-1">{{ $item['category'] ?? 'Solar' }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-4 border-t border-neutral-100 pt-4 sm:block sm:border-l sm:border-t-0 sm:pl-6 sm:pt-0 sm:text-right">
                        <div>
                            <span class="text-sm font-black uppercase tracking-wider text-neutral-400">{{ ($item['quantity'] ?? 1) > 1 ? 'Line total' : 'Starting at' }}</span>
                            <strong class="mt-1 block text-2xl font-semibold">${{ number_format($item['price'] * ($item['quantity'] ?? 1), 0) }}</strong>
                        </div>
                        <button wire:click="removeFromCart({{ $index }})" aria-label="Remove {{ $item['name'] }}" class="mt-0 rounded-full p-2 text-neutral-400 transition hover:bg-red-50 hover:text-red-600 data-loading:pointer-events-none data-loading:opacity-40 sm:mt-5">
                            <flux:icon.trash class="size-5" />
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
        <a href="{{ route('rentals') }}" wire:navigate class="inline-flex items-center gap-2 text-base font-semibold text-neutral-700 underline decoration-general decoration-2 underline-offset-4 hover:text-neutral-950"><flux:icon.plus class="size-4" /> Add another solution</a>
    @else
        <div class="rounded-2xl border border-dashed border-neutral-300 bg-white px-6 py-14 text-center">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-general/15 text-[#9a6700]"><flux:icon.bolt class="size-7" /></div>
            <h3 class="mt-5 text-2xl font-bold">Your energy plan is empty</h3>
            <p class="mx-auto mt-2 max-w-md text-base leading-7 text-neutral-500">Explore panels, storage, inverters, and complete solar kits to start a focused consultation.</p>
            <flux:button :href="route('rentals')" wire:navigate variant="primary" class="mt-6 rounded-full! px-6!">Explore Solutions</flux:button>
        </div>
    @endif
</section>
