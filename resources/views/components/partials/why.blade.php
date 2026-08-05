@props(['products'])

@php
    $productSlides = $products->chunk(4)->values();
@endphp

<section class="bg-white px-6 py-20 text-neutral-900 md:px-12 md:py-24 lg:px-24">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div>
                <h2 class="text-4xl font-extrabold leading-tight md:text-5xl">{{ __('Featured solar products') }}</h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-neutral-600">
                    {{ __('Shop ready-to-estimate solar kits, storage, inverters, and commercial packages with clear starting pricing.') }}
                </p>
            </div>

            <a href="{{ route('solutions') }}" wire:navigate
                class="inline-flex w-max items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2">
                {{ __('View all products') }}
                <flux:icon.arrow-right class="size-4" />
            </a>
        </div>

        @if ($productSlides->isNotEmpty())
            <div x-data="{ active: 0, timer: null, total: {{ $productSlides->count() }}, start() { this.stop(); this.timer = setInterval(() => this.active = (this.active + 1) % this.total, 3000); }, stop() { clearInterval(this.timer); } }"
                x-init="start()" x-on:mouseenter="stop()" x-on:mouseleave="start()" class="mt-12">
                @foreach ($productSlides as $slideIndex => $slide)
                    <div x-show="active === {{ $slideIndex }}" x-transition.opacity.duration.500ms
                        class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4" wire:key="featured-product-slide-{{ $slideIndex }}">
                        @foreach ($slide as $product)
                            @php
                                $productImage = str_starts_with($product->photo, 'http')
                                    ? $product->photo
                                    : (str_starts_with($product->photo, 'img/') ? asset($product->photo) : asset('storage/'.$product->photo));
                            @endphp

                            <article class="group overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm transition-all duration-300 ease-out hover:-translate-y-1 hover:border-general hover:shadow-xl">
                                <a href="{{ route('solution-details', $product->slug) }}" wire:navigate class="block">
                                    <div class="aspect-4/3 overflow-hidden bg-neutral-100">
                                        <img src="{{ $productImage }}" alt="{{ $product->name }}" loading="lazy" decoding="async"
                                            class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105">
                                    </div>

                                    <div class="p-5">
                                        <div class="flex items-start justify-between gap-4">
                                            <div class="min-w-0">
                                                <p class="text-xs font-semibold uppercase tracking-wide text-[#9a6700]">{{ $product->category }}</p>
                                                <h3 class="mt-2 line-clamp-2 text-lg font-bold leading-snug text-neutral-950">{{ $product->name }}</h3>
                                            </div>
                                            <p class="shrink-0 text-right text-lg font-extrabold text-neutral-950">${{ number_format($product->price, 0) }}</p>
                                        </div>

                                        <ul class="mt-5 space-y-2 text-sm text-neutral-600">
                                            <li class="flex items-center gap-2"><flux:icon.check class="size-3 text-[#9a6700]" />{{ $product->subcategory ?: __('Solar solution') }}</li>
                                            <li class="flex items-center gap-2"><flux:icon.check class="size-3 text-[#9a6700]" />{{ $product->reviews_count }} {{ Str::plural(__('customer review'), $product->reviews_count) }}</li>
                                            <li class="flex items-center gap-2"><flux:icon.check class="size-3 text-[#9a6700]" />{{ $product->stock_quantity }} {{ __('allocation slots') }}</li>
                                        </ul>

                                        <div class="mt-6 flex items-center justify-between border-t border-neutral-100 pt-4">
                                            <span class="text-sm font-semibold text-neutral-950">{{ __('View product') }}</span>
                                            <flux:icon.arrow-right class="size-4 text-neutral-400 transition group-hover:translate-x-1 group-hover:text-[#9a6700]" />
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endforeach

                @if ($productSlides->count() > 1)
                    <div class="mt-6 flex justify-center gap-2" aria-label="Featured product slides">
                        @foreach ($productSlides as $slideIndex => $slide)
                            <button type="button" x-on:click="active = {{ $slideIndex }}; start()" :aria-current="active === {{ $slideIndex }} ? 'true' : 'false'"
                                class="size-2.5 rounded-full bg-neutral-300 transition aria-[current=true]:bg-general" aria-label="Show featured products {{ $slideIndex + 1 }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <p class="mt-12 rounded-xl border border-dashed border-neutral-300 p-10 text-center text-neutral-500">{{ __('Featured products will appear here soon.') }}</p>
        @endif
    </div>
</section>
