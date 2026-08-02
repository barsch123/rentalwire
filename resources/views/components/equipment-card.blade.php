@props(['equipment', 'interactive' => true, 'wishlisted' => false])

<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-neutral-200 bg-white transition duration-300 hover:border-neutral-400 hover:shadow-lg">
    <div class="relative aspect-16/10 overflow-hidden bg-neutral-100">
        <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}" wire:navigate class="block h-full">
            <img src="{{ Str::startsWith($equipment->photo, 'http') ? $equipment->photo : asset('storage/'.$equipment->photo) }}"
                alt="{{ $equipment->name }}" loading="lazy" decoding="async"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
        </a>

        <span @class([
            'absolute left-3 top-3 rounded-md px-2.5 py-1 text-xs font-semibold shadow-sm',
            'bg-white text-emerald-700' => $equipment->isAvailable(),
            'bg-red-700 text-white' => ! $equipment->isAvailable(),
        ])>
            {{ $equipment->isAvailable() ? ($equipment->stock_quantity <= 3 ? 'Only '.$equipment->stock_quantity.' left' : 'Available') : 'Unavailable' }}
        </span>

        @if ($interactive)
            <flux:button wire:click="toggleWishlist({{ $equipment->id }})" icon="heart" icon:variant="{{ $wishlisted ? 'solid' : 'outline' }}"
                variant="filled" size="sm" square tooltip="{{ $wishlisted ? 'Remove from wishlist' : 'Save to wishlist' }}"
                @class(['absolute right-3 top-3 shadow-sm', 'text-red-600!' => $wishlisted])
                aria-label="{{ $wishlisted ? 'Remove' : 'Add' }} {{ $equipment->name }} {{ $wishlisted ? 'from' : 'to' }} wishlist" />
        @endif
    </div>

    <div class="flex flex-1 flex-col p-4">
        <div class="flex min-h-5 items-center justify-between gap-3 text-xs">
            <span class="font-semibold text-[#8a5c00]">{{ $equipment->category }}</span>
            @if ($equipment->subcategory)
                <span class="truncate text-neutral-500">{{ $equipment->subcategory }}</span>
            @endif
        </div>

        <h3 class="mt-2 line-clamp-2 min-h-10 text-base font-bold leading-5 text-neutral-950">
            <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}" wire:navigate class="transition hover:text-[#8a5c00]">
                {{ $equipment->name }}
            </a>
        </h3>

        <p class="mt-1.5 line-clamp-2 min-h-9 text-xs leading-[1.125rem] text-neutral-500" title="{{ $equipment->description }}">
            {{ $equipment->description }}
        </p>

        <div class="mt-3 flex min-h-5 items-center gap-2 text-xs">
            <span class="font-semibold text-[#9a6700]">
                {{ number_format((float) ($equipment->reviews_avg_rating ?? 0), 1) }} ★
            </span>
            <span class="text-neutral-400">{{ $equipment->reviews_count ?? 0 }} {{ Str::plural('review', $equipment->reviews_count ?? 0) }}</span>
        </div>

        <div class="mt-3 border-t border-neutral-100 pt-3">
            <span class="text-xs text-neutral-500">Starting estimate</span>
            <p class="mt-0.5 text-lg font-bold text-neutral-950">${{ number_format($equipment->price, 0) }}</p>
        </div>

        <div @class(['mt-3 grid gap-2', 'grid-cols-2' => $interactive, 'grid-cols-1' => ! $interactive])>
            <flux:button :href="route('rental-details', ['slug' => $equipment->slug])" wire:navigate variant="outline" size="sm" icon="eye">
                Details
            </flux:button>
            @if ($interactive)
                <flux:button wire:click="addToCart({{ $equipment->id }})" variant="primary" size="sm" icon="shopping-cart" :disabled="! $equipment->isAvailable()">
                    <span aria-hidden="true">Add</span>
                    <span class="sr-only">Add to Estimate</span>
                </flux:button>
            @endif
        </div>
    </div>
</article>
