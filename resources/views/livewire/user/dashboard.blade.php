<main class="min-h-screen bg-white pb-24 pt-28 text-neutral-950">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <header class="flex flex-col gap-6 border-b border-neutral-200 pb-8 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-[#9a6700]">Customer account</p>
                <h1 class="mt-2 text-3xl font-bold sm:text-4xl">Welcome back, {{ Str::before($user->name, ' ') }}</h1>
                <p class="mt-3 max-w-2xl text-base leading-7 text-neutral-600">Review your solar plan, saved solutions, membership benefits, and recent feedback.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <flux:button :href="route('settings.profile')" wire:navigate icon="cog-6-tooth" variant="outline">Account settings</flux:button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:button type="submit" icon="arrow-right-start-on-rectangle" variant="ghost">Log out</flux:button>
                </form>
            </div>
        </header>

        <section class="grid border-b border-neutral-200 py-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="border-b border-neutral-200 py-5 sm:border-r sm:px-6 sm:first:pl-0 lg:border-b-0">
                <p class="text-sm text-neutral-500">Membership</p>
                <p class="mt-2 text-2xl font-bold">{{ ucfirst($user->membership_tier) }}</p>
            </div>
            <div class="border-b border-neutral-200 py-5 sm:px-6 lg:border-b-0 lg:border-r">
                <p class="text-sm text-neutral-500">Member discount</p>
                <p class="mt-2 text-2xl font-bold text-emerald-700">{{ $user->discount_percent }}%</p>
            </div>
            <div class="border-b border-neutral-200 py-5 sm:border-b-0 sm:border-r sm:px-6">
                <p class="text-sm text-neutral-500">Saved solutions</p>
                <p class="mt-2 text-2xl font-bold">{{ $wishlist->count() }}</p>
            </div>
            <div class="py-5 sm:px-6">
                <p class="text-sm text-neutral-500">Estimate total</p>
                <p class="mt-2 text-2xl font-bold">${{ number_format($estimateTotal, 0) }}</p>
            </div>
        </section>

        <div class="mt-12 grid gap-12 lg:grid-cols-[minmax(0,1fr)_20rem]">
            <div class="min-w-0 space-y-14">
                <section>
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold">Your wishlist</h2>
                            <p class="mt-1 text-sm text-neutral-500">Solutions saved for comparison.</p>
                        </div>
                        <flux:button :href="route('rentals')" wire:navigate icon="plus" variant="outline" size="sm">Browse solutions</flux:button>
                    </div>
                    <div class="mt-6 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                        @forelse ($wishlist as $equipment)
                            <div class="relative" wire:key="wishlist-{{ $equipment->id }}">
                                <x-equipment-card :equipment="$equipment" :interactive="false" />
                                <flux:tooltip content="Remove from wishlist">
                                    <flux:button wire:click="removeFromWishlist({{ $equipment->id }})" icon="x-mark" variant="filled" size="sm" class="absolute right-2 top-2" aria-label="Remove {{ $equipment->name }} from wishlist" />
                                </flux:tooltip>
                            </div>
                        @empty
                            <div class="border-y border-neutral-200 py-10 sm:col-span-2 xl:col-span-3">
                                <p class="font-semibold">No saved solutions yet</p>
                                <p class="mt-2 text-sm text-neutral-500">Use the heart button on any solution page to keep it here.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <section>
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-bold">Recent reviews</h2>
                        <a href="{{ route('support') }}" wire:navigate class="text-sm font-semibold text-blue-700">Customer support</a>
                    </div>
                    <div class="mt-5 divide-y divide-neutral-200 border-y border-neutral-200">
                        @forelse ($reviews as $review)
                            <article class="py-5" wire:key="account-review-{{ $review->id }}">
                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <a href="{{ route('rental-details', $review->equipment->slug) }}" class="font-semibold hover:text-[#9a6700]">{{ $review->equipment->name }}</a>
                                    <span class="text-sm text-[#9a6700]">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span>
                                </div>
                                <p class="mt-2 text-sm leading-6 text-neutral-600">{{ $review->comment }}</p>
                            </article>
                        @empty
                            <p class="py-8 text-sm text-neutral-500">Your product reviews will appear here.</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <aside class="space-y-8 lg:border-l lg:border-neutral-200 lg:pl-8">
                <section>
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="text-lg font-bold">Current estimate</h2>
                        <span class="text-sm text-neutral-500">{{ $estimateItems->sum(fn ($item) => $item['quantity'] ?? 1) }} items</span>
                    </div>
                    <div class="mt-4 divide-y divide-neutral-200 border-y border-neutral-200">
                        @forelse ($estimateItems->take(4) as $item)
                            <div class="py-4">
                                <p class="text-sm font-semibold">{{ $item['name'] }}</p>
                                <p class="mt-1 text-xs text-neutral-500">Qty {{ $item['quantity'] ?? 1 }} · ${{ number_format($item['price'] * ($item['quantity'] ?? 1), 0) }}</p>
                            </div>
                        @empty
                            <p class="py-6 text-sm text-neutral-500">Your estimate is currently empty.</p>
                        @endforelse
                    </div>
                    <flux:button :href="route('checkout')" wire:navigate variant="primary" class="mt-4 w-full">Review estimate</flux:button>
                </section>

                <section class="border-t border-neutral-200 pt-8">
                    <h2 class="text-lg font-bold">Need assistance?</h2>
                    <p class="mt-2 text-sm leading-6 text-neutral-500">Search common questions or send an issue to the Solara team.</p>
                    <flux:button :href="route('support')" wire:navigate icon="chat-bubble-left-right" variant="outline" class="mt-4 w-full">Open support</flux:button>
                </section>
            </aside>
        </div>
    </div>
</main>
