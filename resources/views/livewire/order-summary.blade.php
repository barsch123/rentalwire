<!-- Customer + Order Summary -->
<div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
    <h2 class="text-2xl font-bold text-neutral-900 mb-6">Customer Information</h2>
    @if (Auth::check())
        <form>
            <div class="mb-6">
                <label class="sr-only block text-gray-700 mb-2 text-sm font-medium">First Name</label>
                <flux:input label="Name" wire:model="name" type="text" required />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 text-sm font-medium">Email Address</label>
                <flux:input type="email" wire:model="name" required />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 text-sm font-medium">Contact</label>
                <flux:input wire:model="contact" required />
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
                    class="w-full bg-[#ffb000] text-neutral-100 py-3 rounded-lg mt-6 font-semibold hover:bg-[#e0a000] transition-colors">
                    Continue to Payment →
                </button>
            </div>
        </form>
    @else
       
    @endif

</div>