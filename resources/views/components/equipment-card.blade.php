@props(['equipment'])

<div
    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
    <!-- Image -->
    <div class="relative h-56 overflow-hidden">
        <img src="{{ Str::startsWith($equipment->photo, 'http') ? $equipment->photo : asset('storage/' . $equipment->photo) }}"
            alt="{{ $equipment->name }}"
            class="w-full h-56 object-cover transition-transform duration-500 hover:scale-105">

        <!-- Badge -->
        <div
            class="absolute top-2 right-2 bg-[#ffab00] text-white text-xs font-bold px-2 py-1 rounded max-w-[70%] truncate">
            {{ $equipment->subcategory ?: $equipment->category }}
        </div>
    </div>

    <!-- Body -->
    <div class="p-4 flex flex-col flex-1">
        <!-- Title: clamp to 2 lines, allow breaks for very long words -->
        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 break-words break-all min-h-[3.5rem]">
            {{ $equipment->name }}
        </h3>

        <!-- Description: clamp to 2 lines, safe word breaks -->
        <p class="text-gray-600 text-sm mb-3 line-clamp-2 break-words break-all">
            {{ $equipment->description }}
        </p>

        <!-- Footer (sticks to bottom) -->
        <div class="mt-auto">
            <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900">
                    ${{ number_format($equipment->price, 2) }}
                </span>
            </div>

            <div class="mt-4 flex space-x-2">
                <flux:button wire:click="addToCart({{ $equipment->id }})"
                    class="flex-1 bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-800 transition flex items-center justify-center text-sm font-medium">
                    Add to Cart
                </flux:button>

                <a href="{{ route('rental-details', ['slug' => $equipment->slug]) }}"
                    class="flex-1 flex items-center justify-center px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition text-sm font-medium">
                    Details
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-toast', (e) => {
        console.log('show-toast event:', e);       // <--- inspect this in console
        console.log('show-toast detail:', e.detail); // should contain { title, body, timeout }
    });
</script>