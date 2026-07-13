@props(['equipment'])

<article class="flex h-full flex-col overflow-hidden rounded-xl border border-neutral-200 bg-white transition-colors hover:border-neutral-400">
    <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}" wire:navigate
        class="block overflow-hidden bg-neutral-100">
        <img src="{{ Str::startsWith($equipment->photo, 'http') ? $equipment->photo : asset('storage/'.$equipment->photo) }}"
            alt="{{ $equipment->name }}" loading="lazy" decoding="async"
            class="h-40 w-full object-cover sm:h-44">
    </a>

    <div class="flex flex-1 flex-col p-4">
        <div class="flex items-center justify-between gap-4 text-xs">
            <span class="font-semibold text-[#9a6700]">{{ $equipment->category }}</span>
            <span class="text-neutral-500">{{ $equipment->subcategory }}</span>
        </div>

        <h3 class="mt-2 text-base font-bold leading-snug text-neutral-950">
            <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}" wire:navigate
                class="transition-colors hover:text-[#9a6700]">
                {{ $equipment->name }}
            </a>
        </h3>

        <p class="mt-1.5 truncate text-sm text-neutral-500" title="{{ $equipment->description }}">
            {{ $equipment->description }}
        </p>

        <div class="mt-4 flex items-end justify-between gap-3 border-t border-neutral-100 pt-3">
            <div>
            <span class="text-xs text-neutral-500">Starting at</span>
                <p class="text-lg font-bold text-neutral-950">${{ number_format($equipment->price, 0) }}</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}" wire:navigate
                    class="inline-flex h-8 items-center justify-center rounded-lg border border-neutral-200 bg-white px-3 text-xs font-semibold text-neutral-700 transition hover:border-general hover:text-neutral-950"
                    aria-label="View {{ $equipment->name }} details">
                    Details
                </a>
                <flux:tooltip content="Add to estimate">
                    <flux:button wire:click="addToCart({{ $equipment->id }})" variant="primary" size="sm"
                        class="rounded-lg! data-loading:pointer-events-none data-loading:opacity-60"
                        aria-label="Add {{ $equipment->name }} to estimate">
                        <flux:icon.shopping-cart class="size-4" />
                        <span class="sr-only">Add to Estimate</span>
                    </flux:button>
                </flux:tooltip>
            </div>
        </div>
    </div>
</article>
