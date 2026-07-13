<div class="min-h-screen bg-white px-4 pb-16 pt-24 text-neutral-950 sm:px-6 lg:px-0" x-data="{ filtersOpen: false }">
    <section id="solutions" class="mx-auto w-full max-w-[96rem] overflow-hidden rounded-lg border border-neutral-300 bg-white lg:max-w-none lg:rounded-none lg:border-x-0">
        <div class="grid min-h-[42rem] lg:grid-cols-[19rem_minmax(0,1fr)]">
            <aside class="hidden border-r border-neutral-200 bg-neutral-50/80 lg:block">
                <div class="sticky top-20 p-5">
                    <div class="flex items-center justify-between border-b border-neutral-300 pb-4">
                        <h2 class="text-sm font-bold text-neutral-950">Filter</h2>
                        <flux:button type="button" wire:click="resetFilters" variant="ghost" size="sm" square icon="trash"
                            tooltip="Clear all" aria-label="Clear all filters"
                            class="rounded-md! text-neutral-500! hover:bg-neutral-200! hover:text-neutral-950!" />
                    </div>

                    <div class="mt-5 space-y-6">
                        <fieldset>
                            <legend class="text-base font-bold text-neutral-950">Price</legend>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <div class="mb-2 flex items-center justify-between text-base font-semibold text-neutral-600">
                                        <span>Min</span>
                                        <span>${{ number_format((float) $tempMinPrice, 0) }}</span>
                                    </div>
                                    <input type="range" wire:model.live="tempMinPrice" min="{{ $priceFloor }}" max="{{ $priceCeiling }}"
                                        step="{{ $priceStep }}" aria-label="Minimum price"
                                        class="h-1.5 w-full cursor-pointer appearance-none rounded-full bg-neutral-300 accent-general">
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center justify-between text-base font-semibold text-neutral-600">
                                        <span>Max</span>
                                        <span>${{ number_format((float) $tempMaxPrice, 0) }}</span>
                                    </div>
                                    <input type="range" wire:model.live="tempMaxPrice" min="{{ $priceFloor }}" max="{{ $priceCeiling }}"
                                        step="{{ $priceStep }}" aria-label="Maximum price"
                                        class="h-1.5 w-full cursor-pointer appearance-none rounded-full bg-neutral-300 accent-general">
                                </div>

                                <div class="mt-3 grid grid-cols-2 gap-3">
                                    <flux:input wire:model.live.debounce.300ms="tempMinPrice" type="number" min="{{ $priceFloor }}" max="{{ $priceCeiling }}" step="{{ $priceStep }}" placeholder="Min" aria-label="Minimum price" />
                                    <flux:input wire:model.live.debounce.300ms="tempMaxPrice" type="number" min="{{ $priceFloor }}" max="{{ $priceCeiling }}" step="{{ $priceStep }}" placeholder="Max" aria-label="Maximum price" />
                                </div>
                            </div>
                        </fieldset>

                        <div class="border-t border-neutral-200 pt-5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-bold text-neutral-950">Category</h3>
                                <flux:icon.chevron-up class="size-4 text-neutral-500" />
                            </div>

                            <div class="mt-3">
                                <flux:input wire:model.live.debounce.400ms="search" icon="magnifying-glass" placeholder="Search category" aria-label="Search solar solutions" />
                            </div>

                            <div class="mt-4 space-y-3">
                                @foreach ($categories as $category)
                                    <button type="button" wire:key="desktop-category-{{ $category }}" wire:click="selectCategory(@js($category))"
                                        class="flex w-full items-center justify-between gap-3 text-left text-base text-neutral-700 transition hover:text-neutral-950">
                                        <span class="flex min-w-0 items-center gap-2">
                                            <span class="flex size-3.5 shrink-0 items-center justify-center rounded border {{ $selectedCategory === $category ? 'border-general bg-general' : 'border-neutral-300 bg-white' }}">
                                                @if ($selectedCategory === $category)
                                                    <flux:icon.check class="size-3 text-neutral-950" />
                                                @endif
                                            </span>
                                            <span class="truncate">{{ $category }}</span>
                                        </span>
                                        <span class="text-base text-neutral-400">{{ $categoryCounts[$category] ?? 0 }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="border-t border-neutral-200 pt-5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-bold text-neutral-950">Subcategory</h3>
                                <flux:icon.chevron-down class="size-4 text-neutral-500" />
                            </div>
                            <div class="mt-3">
                                <flux:select wire:model="tempSelectedSubcategory" wire:key="desktop-subcategories-{{ $tempSelectedCategory ?: 'all' }}" :disabled="empty($subcategories)">
                                    <flux:select.option value="">All subcategories</flux:select.option>
                                    @foreach ($subcategories as $subcategory)
                                        <flux:select.option value="{{ $subcategory }}">{{ $subcategory }}</flux:select.option>
                                    @endforeach
                                </flux:select>
                            </div>
                        </div>

                        <div class="border-t border-neutral-200 pt-5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-bold text-neutral-950">Sort</h3>
                                <flux:icon.chevron-down class="size-4 text-neutral-500" />
                            </div>
                            <div class="mt-3">
                                <flux:select wire:model="tempSortOption">
                                    <flux:select.option value="newest">Newest first</flux:select.option>
                                    <flux:select.option value="priceLowHigh">Price: Low to high</flux:select.option>
                                    <flux:select.option value="priceHighLow">Price: High to low</flux:select.option>
                                    <flux:select.option value="nameAZ">Name: A - Z</flux:select.option>
                                    <flux:select.option value="nameZA">Name: Z - A</flux:select.option>
                                </flux:select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 border-t border-neutral-200 pt-5">
                            <flux:button wire:click="applyFilters" variant="primary" class="rounded-lg! data-loading:pointer-events-none data-loading:opacity-60">Apply</flux:button>
                            <flux:button wire:click="resetFilters" variant="ghost" class="rounded-lg! border! border-neutral-200! text-neutral-700!">Clear</flux:button>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="min-w-0 bg-white p-5 sm:p-6 lg:p-8">
                <div class="flex flex-col gap-4 border-b border-neutral-100 pb-5 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <h1 class="text-base font-bold text-neutral-950">Recent Searches</h1>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @if (filled($search))
                                <button type="button" wire:click="$set('search', '')" class="inline-flex items-center gap-1 rounded border border-neutral-300 bg-white px-2.5 py-1 text-base text-neutral-700 transition hover:border-neutral-400">
                                    {{ $search }}
                                    <flux:icon.x-mark class="size-3" />
                                </button>
                            @endif

                            @if ($selectedCategory)
                                <button type="button" wire:click="resetFilters" class="inline-flex items-center gap-1 rounded border border-neutral-300 bg-white px-2.5 py-1 text-base text-neutral-700 transition hover:border-neutral-400">
                                    {{ $selectedCategory }}
                                    <flux:icon.x-mark class="size-3" />
                                </button>
                            @endif

                            @if ($selectedSubcategory)
                                <button type="button" wire:click="resetFilters" class="inline-flex items-center gap-1 rounded border border-neutral-300 bg-white px-2.5 py-1 text-base text-neutral-700 transition hover:border-neutral-400">
                                    {{ $selectedSubcategory }}
                                    <flux:icon.x-mark class="size-3" />
                                </button>
                            @endif

                            @unless (filled($search) || $selectedCategory || $selectedSubcategory)
                                @foreach (array_slice($categories, 0, 4) as $category)
                                    <button type="button" wire:key="suggested-category-{{ $category }}" wire:click="selectCategory(@js($category))"
                                        class="inline-flex items-center gap-1 rounded border border-neutral-300 bg-white px-2.5 py-1 text-base text-neutral-700 transition hover:border-neutral-400 hover:text-neutral-950">
                                        {{ $category }}
                                        <flux:icon.x-mark class="size-3" />
                                    </button>
                                @endforeach
                            @endunless
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4 lg:justify-end">
                        <span class="text-base text-neutral-600"><strong class="text-neutral-950">{{ $equipmentList->total() }}</strong> results</span>
                        <button type="button" @click="filtersOpen = true" class="inline-flex items-center gap-2 rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-base font-semibold text-neutral-800 lg:hidden">
                            <flux:icon.adjustments-horizontal class="size-4" />
                            Filters
                        </button>
                    </div>
                </div>

                <div x-cloak x-show="filtersOpen" @keydown.escape.window="filtersOpen = false" class="fixed inset-0 z-50 lg:hidden">
                    <button type="button" aria-label="Close filters" @click="filtersOpen = false" class="absolute inset-0 bg-neutral-950/55 backdrop-blur-sm"></button>
                    <div x-show="filtersOpen" x-transition:enter="transition duration-300" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
                        class="absolute inset-x-0 bottom-0 max-h-[88vh] overflow-y-auto rounded-t-2xl bg-white p-6 shadow-2xl">
                        <div class="mb-6 flex items-center justify-between">
                            <h3 class="text-lg font-bold">Filters</h3>
                            <button type="button" @click="filtersOpen = false" class="rounded-lg p-2 text-neutral-500 hover:bg-neutral-100">
                                <flux:icon.x-mark class="size-5" />
                            </button>
                        </div>
                        @include('livewire.partials.solution-filters', ['filterInstance' => 'mobile'])
                    </div>
                </div>

                @if ($equipmentList->count())
                    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach ($equipmentList as $equipment)
                            <x-equipment-card wire:key="solution-card-{{ $equipment->id }}" :equipment="$equipment" />
                        @endforeach
                    </div>

                    <div class="mt-8 border-t border-neutral-100 pt-6">
                        <flux:pagination :paginator="$equipmentList" scroll-to="#solutions" />
                    </div>
                @else
                    <div class="mt-6 rounded-lg border border-dashed border-neutral-300 bg-neutral-50 px-6 py-16 text-center">
                        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-general/20 text-[#9a6700]">
                            <flux:icon.magnifying-glass class="size-5" />
                        </div>
                        <h3 class="mt-5 text-xl font-bold">No matching solar products</h3>
                        <p class="mx-auto mt-2 max-w-md text-base leading-7 text-neutral-600">Try a wider price range or clear the filters to see every available system.</p>
                        <flux:button wire:click="resetFilters" variant="primary" class="mt-6 rounded-lg!">Reset filters</flux:button>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
