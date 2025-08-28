<x-layouts.base>
    <div class="min-h-screen py-28 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <livewire:cart-items />
                <livewire:order-summary />
            </div>
        </div>
    </div>
</x-layouts.base>