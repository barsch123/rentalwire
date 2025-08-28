<!-- Customer + Order Summary -->
<div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
    <h2 class="text-2xl font-bold text-neutral-900 mb-6">Customer Information</h2>
    <form>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-gray-700 mb-2 text-sm font-medium">First Name</label>
                <input type="text"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-[#ffb000] focus:border-[#ffb000]"
                    required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2 text-sm font-medium">Last Name</label>
                <input type="text"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-[#ffb000] focus:border-[#ffb000]"
                    required>
            </div>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 mb-2 text-sm font-medium">Email Address</label>
            <input type="email"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-[#ffb000] focus:border-[#ffb000]"
                required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 mb-2 text-sm font-medium">Phone Number</label>
            <input type="tel"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-[#ffb000] focus:border-[#ffb000]"
                required>
        </div>

        <!-- Order Summary -->
        <div class="border-t pt-6 mt-6">
            <h3 class="text-xl font-bold mb-4">Order Summary</h3>
            @if (!empty($cart))
                @php $total = 0; @endphp
                <div class="space-y-2">
                    @foreach ($cart as $item)
                        @php $total += $item['price']; @endphp
                        <div class="flex justify-between text-gray-700">
                            <span>{{ $item['name'] }}</span>
                            <span>${{ number_format($item['price'], 2) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between text-lg font-bold mt-4">
                    <span>Total</span>
                    <span class="text-[#ffb000]">${{ number_format($total, 2) }}</span>
                </div>
            @endif

            <button type="submit"
                class="w-full bg-[#ffb000] text-white py-3 rounded-lg mt-6 font-semibold hover:bg-[#e0a000] transition-colors">
                Continue to Payment →
            </button>
        </div>
    </form>
</div>