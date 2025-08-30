<div>
    <!-- Notification Popups -->
    <x-toast />


    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-50" src="{{ asset('img/hero-4.png') }}"
                alt="Equipment showcase" loading="lazy" decoding="async"> alt="Equipment showcase">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Premium Equipment For Sale
            </h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
                High-quality tools and gear for professionals and enthusiasts
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <aside class="lg:w-72 space-y-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Filter Equipment</h3>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <flux:select size='sm' wire:model="tempSelectedCategory" wire:change="loadSubcategories"
                                placeholder="Select Category">
                                @foreach ($categories as $category)
                                    <flux:select.option value="{{ $category }}">{{ $category }}
                                    </flux:select.option>
                                @endforeach
                            </flux:select>
                        </div>

                        @if (!empty($subcategories))
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subcategory</label>
                                <select wire:model="tempSelectedSubcategory"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm rounded-md">
                                    <option value="">All Subcategories</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory }}">{{ $subcategory }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Min Price</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>

                                    <flux:input size="sm" wire:model="tempMinPrice" type="number"
                                        class="focus:ring-amber-500 focus:border-amber-500" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Max Price</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <flux:input size="sm" wire:model="tempMaxPrice" type="number"
                                        class="focus:ring-amber-500 focus:border-amber-500" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                            <flux:select size="sm" wire:model="tempSortOption"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm rounded-md">
                                <flux:select.option value="newest">Newest</flux:select.option>
                                <flux:select.option value="priceLowHigh">Price: Low to High</flux:select.option>
                                <flux:select.option value="priceHighLow">Price: High to Low</flux:select.option>
                                <flux:select.option value="nameAZ">Name: A - Z</flux:select.option>
                                <flux:select.option value="nameZA">Name: Z - A</flux:select.option>
                            </flux:select>
                        </div>

                        <x-secondary-button wire:click="applyFilters">
                            Apply Filters
                        </x-secondary-button>
                    </div>
                </div>

                <!-- Mobile Filters -->
                <div class="lg:hidden bg-white p-4 rounded-lg shadow">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <select wire:model="tempSelectedCategory" wire:change="loadSubcategories"
                                class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm rounded-md">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>

                            @if (!empty($subcategories))
                                <select wire:model="tempSelectedSubcategory"
                                    class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm rounded-md">
                                    <option value="">All Subcategories</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory }}">{{ $subcategory }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Equipment Grid -->
            <div class="flex-1">
                @if (!empty($equipmentList) && $equipmentList->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($equipmentList as $equipment)
                            <x-equipment-card :equipment="$equipment" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $equipmentList->links() }}
                    </div>
                @else
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-10 text-center animate-fade-in">
                        <!-- Empty state -->
                        <div class="flex justify-center mb-4">
                            <div class="bg-amber-100 dark:bg-amber-900 p-4 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-600 dark:text-amber-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Oops! No Equipment Available</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 max-w-md mx-auto">
                            We couldn't find any equipment matching your filters. Try broadening your search or resetting
                            your filters.
                        </p>
                        <div class="mt-6">
                            <button wire:click="resetFilters"
                                class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-md text-white bg-[#ffab00] hover:bg-[#e09c00] transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ffab00]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v6h6M20 20v-6h-6M4 20l16-16" />
                                </svg>
                                Reset Filters
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>