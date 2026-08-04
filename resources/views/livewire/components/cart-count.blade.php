<div class="relative" x-data="{ open: false }" @keydown.escape.window="open = false">
    <button type="button" @click="open = !open" :aria-expanded="open"
        class="relative flex size-9 items-center justify-center rounded-lg text-white transition hover:bg-white/10"
        aria-haspopup="true" aria-label="Open estimate">
        <flux:icon.bell class="size-5" />
        @if ($count > 0)
            <span class="absolute -right-1 -top-1 flex min-w-4.5 items-center justify-center rounded-full bg-general px-1 text-[0.6rem] font-bold leading-4 text-neutral-950">
                {{ $count > 9 ? '9+' : $count }}
            </span>
        @endif
    </button>

    <div x-cloak x-show="open" @click.outside="open = false"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="translate-y-1 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="font-sans absolute right-0 z-50 mt-2 w-[min(20rem,calc(100vw-2rem))] overflow-hidden rounded-xl border border-neutral-200 bg-white text-neutral-950 shadow-lg">
        <div class="flex items-center justify-between border-b border-neutral-200 px-4 py-3">
            <h2 class="text-sm font-bold">Estimate</h2>
            <span class="text-xs text-neutral-500">{{ $count }} {{ Str::plural('item', $count) }}</span>
        </div>

        @if ($count > 0)
            <div class="max-h-64 divide-y divide-neutral-100 overflow-y-auto">
                @foreach ($items as $index => $item)
                    <article wire:key="estimate-notification-{{ $item['id'] ?? $index }}-{{ $index }}"
                        class="grid grid-cols-[2.5rem_1fr_auto] items-center gap-3 px-4 py-3">
                        <img src="{{ Str::startsWith($item['photo'] ?? '', 'http') ? $item['photo'] : asset('storage/'.($item['photo'] ?? '')) }}"
                            alt="" class="size-10 rounded-lg bg-neutral-100 object-cover">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium">{{ $item['name'] }}</p>
                            <p class="mt-0.5 text-xs text-neutral-500">Qty {{ $item['quantity'] ?? 1 }} · ${{ number_format($item['price'] * ($item['quantity'] ?? 1), 0) }}</p>
                        </div>
                        <button wire:click="removeItem({{ $index }})" type="button" aria-label="Remove {{ $item['name'] }}"
                            class="rounded p-1 text-neutral-400 hover:bg-neutral-100 hover:text-neutral-700 data-loading:pointer-events-none data-loading:opacity-40">
                            <flux:icon.x-mark class="size-4" />
                        </button>
                    </article>
                @endforeach
            </div>

            <div class="border-t border-neutral-200 px-4 py-3">
                <div class="mb-3 flex justify-between text-sm">
                    <span class="text-neutral-500">Total</span>
                    <strong>${{ number_format($total, 0) }}</strong>
                </div>
                <a href="{{ route('checkout') }}" wire:navigate @click="open = false"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 w-full px-4! py-2.5!">
                    View estimate
                </a>
            </div>
        @else
            <div class="px-4 py-8 text-center">
                <p class="text-sm text-neutral-500">Your estimate is empty.</p>
                <a href="{{ route('solutions') }}" wire:navigate @click="open = false"
                    class="mt-3 inline-block text-sm font-semibold text-neutral-950 underline underline-offset-4">
                    Browse solutions
                </a>
            </div>
        @endif
    </div>
</div>
