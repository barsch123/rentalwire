@php
    $products = [
        [
            'name' => 'Residential Solar Kit',
            'category' => 'Complete kit',
            'price' => '$450,000',
            'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80',
            'alt' => 'Residential rooftop solar panels',
            'details' => ['Panels + inverter', 'Monitoring ready', 'Small homes'],
        ],
        [
            'name' => 'Hybrid Inverter Package',
            'category' => 'Inverter',
            'price' => '$380,000',
            'image' => 'https://images.unsplash.com/photo-1624397640148-949b1732bb0a?auto=format&fit=crop&w=900&q=80',
            'alt' => 'Solar inverter and battery equipment',
            'details' => ['Grid support', 'Battery ready', 'Generator input'],
        ],
        [
            'name' => 'Battery Backup Bundle',
            'category' => 'Storage',
            'price' => '$720,000',
            'image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?auto=format&fit=crop&w=900&q=80',
            'alt' => 'Home battery backup system',
            'details' => ['Critical loads', 'Night use', 'Outage support'],
        ],
        [
            'name' => 'Commercial Solar Array',
            'category' => 'Business system',
            'price' => '$2,500,000',
            'image' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=900&q=80',
            'alt' => 'Commercial solar panel array',
            'details' => ['High-output panels', 'Production monitoring', 'Business scale'],
        ],
    ];
@endphp

<section class="px-6 py-20 bg-white text-neutral-900 md:px-12 md:py-24 lg:px-24">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div>
                <h2 class="text-4xl font-extrabold leading-tight md:text-5xl">
                    Featured solar products
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-neutral-600">
                    Shop ready-to-estimate solar kits, storage, inverters, and commercial packages with clear starting
                    pricing.
                </p>
            </div>

            <a href="{{ route('solutions') }}" wire:navigate
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 w-max rounded-sm! px-4!">
                View all products
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($products as $product)
                <article
                    class="transition-all duration-300 ease-out hover:-translate-y-1 hover:border-general hover:shadow-xl group overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm">
                    <a href="{{ route('solutions') }}" wire:navigate class="block">
                        <div class="aspect-4/3 overflow-hidden bg-neutral-100">
                            <img src="{{ $product['image'] }}" alt="{{ $product['alt'] }}"
                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-[#9a6700]">
                                        {{ $product['category'] }}
                                    </p>
                                    <h3 class="mt-2 text-lg font-bold leading-snug text-neutral-950">
                                        {{ $product['name'] }}
                                    </h3>
                                </div>
                                <p class="shrink-0 text-right text-lg font-extrabold text-neutral-950">
                                    {{ $product['price'] }}
                                </p>
                            </div>

                            <ul class="mt-5 space-y-2 text-sm text-neutral-600">
                                @foreach ($product['details'] as $detail)
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check text-xs text-[#9a6700]"></i>
                                        <span>{{ $detail }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-6 flex items-center justify-between border-t border-neutral-100 pt-4">
                                <span class="text-sm font-semibold text-neutral-950">View product</span>
                                <i class="fas fa-arrow-right text-sm text-neutral-400 transition group-hover:translate-x-1 group-hover:text-[#9a6700]"></i>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
