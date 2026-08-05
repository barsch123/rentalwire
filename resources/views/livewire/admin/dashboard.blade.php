<div class="space-y-6 p-4 sm:p-6">
    <header>
        <flux:heading size="xl" class="mt-1">Operations overview</flux:heading>
        <flux:text class="mt-2">Monitor publishing activity and continue into the dedicated management areas.</flux:text>
    </header>

    <div class="grid gap-6 xl:grid-cols-[minmax(0,2fr)_minmax(18rem,1fr)]">
        <flux:card>
            <flux:heading size="lg">Publishing activity</flux:heading>
            <flux:text class="mt-2">A read-only summary of current blog publishing status.</flux:text>
            <div class="mt-6">
                <livewire:charts />
            </div>
        </flux:card>

        <div class="grid content-start gap-4">
            <flux:card class="space-y-4">
                <div>
                    <flux:heading size="lg">Solution catalog</flux:heading>
                    <flux:text class="mt-2">Create, update, and retire customer-facing solar offerings.</flux:text>
                </div>
                <flux:button :href="route('solutions.index')" wire:navigate variant="primary" icon="arrow-right">
                    Manage solutions
                </flux:button>
            </flux:card>

            <flux:card class="space-y-4">
                <div>
                    <flux:heading size="lg">Blog publishing</flux:heading>
                    <flux:text class="mt-2">Manage articles, publication status, and catalog education content.</flux:text>
                </div>
                <flux:button :href="route('adminblog.index')" wire:navigate variant="outline" icon="arrow-right">
                    Manage blogs
                </flux:button>
            </flux:card>
        </div>
    </div>

    @php
        $maximumReviewCount = max(1, $products->max('reviews_count'));
    @endphp

    <flux:card>
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <flux:heading size="lg">Product reviews</flux:heading>
                <flux:text class="mt-2">Review totals for each product in the solution catalog.</flux:text>
            </div>
            <flux:badge color="amber">{{ $products->sum('reviews_count') }} total reviews</flux:badge>
        </div>

        <div role="img" aria-label="Total reviews for each product" class="mt-6 space-y-3" data-product-review-chart>
            @forelse ($products as $product)
                @php
                    $barWidth = ($product->reviews_count / $maximumReviewCount) * 100;
                @endphp

                <div wire:key="product-review-{{ $product->id }}" class="grid grid-cols-[minmax(8rem,12rem)_minmax(0,1fr)_2rem] items-center gap-3 text-sm sm:grid-cols-[minmax(12rem,18rem)_minmax(0,1fr)_2rem]">
                    <span class="truncate font-medium text-zinc-900 dark:text-white" title="{{ $product->name }}">{{ $product->name }}</span>
                    <div class="h-3 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
                        <div class="h-full rounded-full bg-amber-500 transition-all dark:bg-amber-400" style="width: {{ $barWidth }}%"></div>
                    </div>
                    <span class="text-right tabular-nums text-zinc-600 dark:text-zinc-300">{{ $product->reviews_count }}</span>
                </div>
            @empty
                <p class="py-6 text-center text-zinc-500">No products have been added yet.</p>
            @endforelse
        </div>
    </flux:card>
</div>
