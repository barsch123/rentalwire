@section('title', 'Checkout - SHECLJA')
<div class="min-h-screen py-24">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Cart Section -->
            <div class="bg-white rounded-md shadow-md p-6">
                <div class="md:flex  items-center justify-between w-full">
                    <h2 class="text-2xl font-semibold mb-6">Checkout</h2>
                    @if(!empty($cart))
                    <button wire:click="removeAllItems"
                        class="w-28 bg-red-500 text-white px-3 p-2 rounded-md hover:bg-red-600 transition">
                        Remove All
                    </button>
                    @endif

                </div>
                @if (!empty($cart))
                <div class="flex justify-between mb-4">
                    <div>
                        {{-- <button wire:click="deselectAllItems"
                            class="w-full sm:w-auto bg-neutral-800 text-white px-4 py-2 rounded-md hover:bg-neutral-700 transition sm:ml-2 mt-2 sm:mt-0">
                            Deselect All
                        </button> --}}

                    </div>
                </div>
                @foreach ($cart as $index => $item)
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="selectedItems" value="{{ $index }}"
                            class="h-4 w-4 text-blue-600 rounded">
                        <img src="{{ asset('storage/' . $item['photo']) }}" alt="{{ $item['name'] }}"
                            class="w-20 h-20 object-cover ml-4">
                        <div class="ml-4 flex-grow">
                            <h3 class="text-lg font-medium">{{ $item['name'] }}</h3>
                            <p class="text-gray-600">${{ number_format($item['price'], 2) }}</p>

                        </div>
                        <button wire:click="removeFromCart({{ $index }})" class="text-red-500 hover:text-red-700">
                            <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M960 160h-291.2a160 160 0 0 0-313.6 0H64a32 32 0 0 0 0 64h896a32 32 0 0 0 0-64zM512 96a96 96 0 0 1 90.24 64h-180.48A96 96 0 0 1 512 96zM844.16 290.56a32 32 0 0 0-34.88 6.72A32 32 0 0 0 800 320a32 32 0 1 0 64 0 33.6 33.6 0 0 0-9.28-22.72 32 32 0 0 0-10.56-6.72zM832 416a32 32 0 0 0-32 32v96a32 32 0 0 0 64 0v-96a32 32 0 0 0-32-32zM832 640a32 32 0 0 0-32 32v224a32 32 0 0 1-32 32H256a32 32 0 0 1-32-32V320a32 32 0 0 0-64 0v576a96 96 0 0 0 96 96h512a96 96 0 0 0 96-96v-224a32 32 0 0 0-32-32z"
                                        fill="#231815"></path>
                                    <path
                                        d="M384 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0zM544 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0zM704 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0z"
                                        fill="#231815"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-red-600">Your cart is empty.</p>
                @endif
            </div>

            <!-- Customer Information Section -->
            <div class="bg-white rounded-md shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Customer Information</h2>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-700 mb-2">First Name</label>
                            <input type="text"
                                class="w-full border border-gray-300 outline-none px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Last Name</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 outline-none rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Email Address</label>
                        <input type="email"
                            class="w-full px-4 py-2 border border-gray-300 outline-none rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Phone Number</label>
                        <input type="tel"
                            class="w-full px-4 py-2 border border-gray-300 outline-none rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t pt-6 mt-6">
                        <h3 class="text-xl font-semibold mb-4">Order Summary</h3>
                        @if (!empty($cart))
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                        @php
                        $total += $item['price'];
                        @endphp
                        <div class="flex justify-between text-lg">
                            <span>{{ $item['name'] }}</span>
                            <span>${{ number_format($item['price'], 2) }}</span>
                        </div>
                        @endforeach
                        <div class="flex justify-between text-lg font-bold mt-4">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        @endif

                        <button type="submit"
                            class="w-full bg-[#ffb000] text-white py-3 rounded-md mt-6 hover:bg-yellow-600 transition-colors">
                            Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>