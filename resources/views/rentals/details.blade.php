<x-layouts.base>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" x-data="{ activeTab: 'details' }">
    <div class="grid grid-cols-1 mt-20 lg:grid-cols-2 gap-12">
        <div>
            <!-- Main Image -->
            <div class="rounded-xl overflow-hidden shadow-sm bg-gray-50">
                <img src="{{ asset('storage/' . $equipment->photo) }}" alt="{{ $equipment->name }}"
                    class="w-full h-96 object-cover transition duration-300 hover:scale-105">
            </div>

            <!-- Thumbnails -->
            <div class="grid grid-cols-4 gap-2 mt-4">
                @for ($i = 0; $i < 4; $i++)
                    <div
                        class="bg-gray-200 rounded-md h-20 cursor-pointer border-2 border-transparent hover:border-yellow-400 transition">
                    </div>
                @endfor
            </div>
        </div>

        <!-- Info Section -->
        <div class="sticky top-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $equipment->name }}</h1>

            <!-- Rating -->
            <div class="flex items-center mt-2 mb-4 text-sm text-gray-600">
                <div class="flex text-yellow-400">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <span class="ml-2">12 reviews</span>
            </div>

            <!-- Price -->
            <div class="text-2xl font-semibold text-gray-800 mb-6">
                ${{ number_format($equipment->price, 2) }}
            </div>

            <!-- Tabs -->
            <div>
                <div class="border-b border-gray-200 mb-4">
                    <nav class="flex space-x-6">
                        <button class="pb-2 text-sm font-medium"
                            :class="activeTab === 'details' ? 'border-b-2 border-yellow-500 text-yellow-600' :
                                'text-gray-500 hover:text-gray-700'"
                            x-on:click="activeTab = 'details'">
                            Details
                        </button>
                        <button class="pb-2 text-sm font-medium"
                            :class="activeTab === 'specs' ? 'border-b-2 border-yellow-500 text-yellow-600' :
                                'text-gray-500 hover:text-gray-700'"
                            x-on:click="activeTab = 'specs'">
                            Specs
                        </button>
                    </nav>
                </div>

                <!-- Details -->
                <div x-show="activeTab === 'details'" class="space-y-4 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Name</span>
                        <span>{{ $equipment->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Price</span>
                        <span>${{ number_format($equipment->price, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Category</span>
                        <span>{{ $equipment->category }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Availability</span>
                        <span class="text-green-600">In Stock</span>
                    </div>
                </div>

                <!-- Specs -->
                <div x-show="activeTab === 'specs'" x-cloak class="mt-4 text-sm text-gray-700 leading-relaxed">
                    <h4 class="font-semibold text-gray-800 mb-2">Technical Specifications</h4>
                    <p class="whitespace-pre-line">{{ $equipment->description }}</p>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="mt-8 flex gap-3">
                <button
                    class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-medium transition duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to Cart
                </button>
                <button
                    class="flex-1 bg-white hover:bg-gray-100 text-gray-800 py-3 rounded-lg border border-gray-300 font-medium transition duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Save for Later
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.base>