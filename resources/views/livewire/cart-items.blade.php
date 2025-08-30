<!-- Cart Section -->
<div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 sm:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-neutral-900 flex items-center gap-2">
            <span class="text-sm text-gray-500 font-normal">({{ count($cart ?? []) }} items)</span>
        </h2>

        @if(!empty($cart))
            <button wire:click="removeAllItems"
                class="px-4 py-2 rounded-lg border border-red-400 text-red-500 hover:bg-red-500 hover:text-white transition-colors text-sm font-medium">
                Remove All
            </button>
        @endif
    </div>

    @if (!empty($cart))
        <div class="space-y-4">
            @foreach ($cart as $index => $item)
                <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:shadow-md transition">
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="selectedItems" value="{{ $index }}"
                            class="h-4 w-4 text-[#ffb000] border-gray-300 rounded">

                        <img src="{{ asset('storage/' . $item['photo']) }}" alt="{{ $item['name'] }}"
                            class="w-20 h-20 object-cover rounded-lg ml-4 shadow-sm">

                        <div class="ml-4">
                            <h3 class="text-base font-semibold text-neutral-900">{{ $item['name'] }}</h3>
                            <p class="text-gray-500 text-sm">${{ number_format($item['price'], 2) }}</p>
                        </div>
                    </div>

                    <button wire:click="removeFromCart({{ $index }})" class="text-red-500 hover:text-red-700 transition"
                        title="Remove item">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024">
                            <path
                                d="M960 160H668.8a160 160 0 0 0-313.6 0H64a32 32 0 0 0 0 64h896a32 32 0 0 0 0-64zM512 96a96 96 0 0 1 90.24 64H421.76A96 96 0 0 1 512 96zM832 416a32 32 0 0 0-32 32v416a32 32 0 0 1-64 0V448a32 32 0 0 0-64 0v416a32 32 0 0 1-64 0V448a32 32 0 0 0-64 0v416a32 32 0 0 1-64 0V448a32 32 0 0 0-64 0v416a32 32 0 0 1-64 0V448a32 32 0 0 0-64 0v416a96 96 0 0 0 96 96h512a96 96 0 0 0 96-96V448a32 32 0 0 0-32-32z">
                            </path>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center text-center py-10">
            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8H19m-12 0a2 2 0 11-4 0 2 2 0 014 0zm12 0a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <p class="text-gray-500 font-medium">Your cart is empty.</p>
            <a href="{{route('rentals')}}" class="mt-3 text-general font-medium hover:underline">
                Continue shopping →
            </a>
        </div>
    @endif
</div>