<x-layouts.base>
    @section('title', $equipment->name.' | Solara')
    @section('description', Str::limit($equipment->description, 150))
    @section('keywords', $equipment->name.', solar solutions, Solara, Jamaica')

    @php
        $productImage = Str::startsWith($equipment->photo, 'http')
            ? $equipment->photo
            : (Str::startsWith($equipment->photo, 'img/') ? asset($equipment->photo) : asset('storage/'.$equipment->photo));
    @endphp

    <main class="min-h-screen bg-white px-4 pb-16 pt-28 text-neutral-950 sm:px-6 lg:px-8">
        <section class="w-full  border-neutral-300 bg-white p-4 sm:p-5 lg:p-6">
            <div class="grid gap-8 lg:grid-cols-[minmax(32rem,0.85fr)_minmax(28rem,1fr)]">
                <div class="grid gap-4 sm:grid-cols-[4rem_minmax(0,1fr)] lg:max-w-3xl">
                    <div class="order-2 grid grid-cols-4 gap-3 sm:order-1 sm:grid-cols-1 sm:self-start">
                        @for ($index = 0; $index < 4; $index++)
                            <button type="button"
                                class="overflow-hidden rounded-md border {{ $index === 0 ? 'border-general ring-2 ring-general/20' : 'border-neutral-200' }} bg-neutral-100 p-1">
                                <img src="{{ $productImage }}" alt="{{ $equipment->name }} preview {{ $index + 1 }}"
                                    class="aspect-3/4 w-full rounded object-cover">
                            </button>
                        @endfor
                    </div>

                    <div class="order-1 overflow-hidden rounded-md  sm:order-2">
                        <img src="{{ $productImage }}" alt="{{ $equipment->name }}"
                            class="aspect-4/3 w-full object-cover">
                    </div>
                </div>

                <div class="min-w-0">
                    <div class="border-b border-neutral-200 pb-5">
                        <p class="text-xs font-medium text-neutral-500">
                            {{ $equipment->category }}{{ $equipment->subcategory ? ' / '.$equipment->subcategory : '' }}
                        </p>
                        <h1 class="mt-2 text-2xl font-bold leading-tight text-neutral-950 md:text-3xl">
                            {{ $equipment->name }}
                        </h1>

                        <div class="mt-5 flex flex-wrap items-end gap-x-3 gap-y-2">
                            <p class="text-3xl font-black text-neutral-950">${{ number_format($equipment->price, 0) }}</p>
                            <p class="pb-1 text-sm text-neutral-500">Starting estimate</p>
                        </div>

                        <div class="mt-4 flex flex-wrap items-center gap-3">
                            <flux:badge :color="$equipment->isAvailable() ? 'green' : 'red'" class="{{ $equipment->isAvailable() ? 'bg-emerald-100! text-emerald-800! dark:bg-emerald-900! dark:text-emerald-200!' : '' }}">
                                {{ $equipment->isAvailable() ? 'Available for estimate' : 'Currently unavailable' }}
                            </flux:badge>
                            @if ($equipment->isAvailable())
                                <span class="text-sm text-neutral-500">{{ $equipment->stock_quantity }} allocation slots remaining</span>
                            @endif
                        </div>

                        @auth
                            @if (Auth::user()->discount_percent > 0)
                                <p class="mt-3 text-sm font-semibold text-emerald-700">{{ ucfirst(Auth::user()->membership_tier) }} member pricing: {{ Auth::user()->discount_percent }}% discount at estimate</p>
                            @endif
                        @endauth

                        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm">
                            <span class="inline-flex items-center gap-1 rounded-md border border-neutral-200 bg-neutral-50 px-2.5 py-1 font-semibold text-neutral-700">
                                4 <i class="fas fa-star text-xs text-general"></i>
                            </span>
                            <span class="text-neutral-500">{{ $equipment->reviews_count }} customer reviews</span>
                        </div>
                    </div>

                    <div class="border-b border-neutral-200 py-5">
                        <h2 class="text-sm font-bold text-neutral-950">System type</h2>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="rounded-md border border-neutral-300 px-3 py-2 text-sm font-medium text-neutral-700">{{ $equipment->category }}</span>
                            @if ($equipment->subcategory)
                                <span class="rounded-md border border-neutral-300 px-3 py-2 text-sm font-medium text-neutral-700">{{ $equipment->subcategory }}</span>
                            @endif
                            <span class="rounded-md border border-neutral-300 px-3 py-2 text-sm font-medium text-neutral-700">Estimate ready</span>
                        </div>

                        <div class="mt-5 grid gap-3 sm:grid-cols-2">
                            <a href="{{ route('contact') }}" wire:navigate
                                class="inline-flex items-center justify-center rounded-md border border-neutral-300 bg-white px-5 py-3 text-sm font-semibold text-neutral-800 transition hover:border-neutral-950 hover:text-neutral-950">
                                Talk to advisor
                            </a>
                            <form method="POST" action="{{ route('solutions.estimate.store', ['slug' => $equipment->slug]) }}">
                                @csrf
                                <flux:button type="submit" variant="primary" class="w-full rounded-md! py-5!" :disabled="! $equipment->isAvailable()">
                                    <flux:icon.shopping-cart class="mr-2 size-4" />
                                    Add to estimate
                                </flux:button>
                            </form>
                        </div>
                    </div>

                    <div class="border-b border-neutral-200 py-5">
                        <h2 class="text-sm font-bold text-neutral-950">Select Service Location</h2>
                        <p class="mt-2 text-xs leading-5 text-neutral-500">
                            Enter your area to check consultation availability and installation planning.
                        </p>
                        <form class="mt-4 flex gap-3" x-data x-on:submit.prevent>
                            <input type="text" placeholder="Enter parish or area"
                                class="min-w-0 flex-1 rounded-md border border-neutral-300 px-3 py-2.5 text-sm outline-none transition placeholder:text-neutral-400 focus:border-general focus:ring-2 focus:ring-general/20">
                            <button type="submit"
                                class="rounded-md bg-general px-5 py-2.5 text-sm font-semibold text-neutral-950 transition hover:brightness-95">
                                Apply
                            </button>
                        </form>
                    </div>

                    <div x-data="{ activeTab: 'details' }" class="mt-5">
                        <div class="flex gap-6 border-b border-neutral-200" role="tablist" aria-label="Solution information">
                            <button type="button" role="tab" :aria-selected="activeTab === 'details'"
                                x-on:click="activeTab = 'details'"
                                class="border-b-2 px-1 pb-3 text-sm font-bold transition"
                                :class="activeTab === 'details' ? 'border-general text-neutral-950' : 'border-transparent text-neutral-500 hover:text-neutral-950'">
                                Details
                            </button>
                            <button type="button" role="tab" :aria-selected="activeTab === 'reviews'"
                                x-on:click="activeTab = 'reviews'"
                                class="border-b-2 px-1 pb-3 text-sm font-bold transition"
                                :class="activeTab === 'reviews' ? 'border-general text-neutral-950' : 'border-transparent text-neutral-500 hover:text-neutral-950'">
                                Reviews ({{ $equipment->reviews_count }})
                            </button>
                        </div>

                        <div x-show="activeTab === 'details'" role="tabpanel" class="divide-y divide-neutral-200">
                            <details class="group py-4" open>
                            <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-bold text-neutral-950">
                                Product details
                                <flux:icon.chevron-down class="size-4 transition group-open:rotate-180" />
                            </summary>
                            <p class="mt-4 rounded-md bg-neutral-50 p-4 text-sm leading-6 text-neutral-600">
                                {{ $equipment->description }}
                            </p>
                            </details>

                            <details class="group py-4">
                            <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-bold text-neutral-950">
                                Vendor details
                                <flux:icon.chevron-down class="size-4 transition group-open:rotate-180" />
                            </summary>
                            <p class="mt-4 text-sm leading-6 text-neutral-600">
                                Solara reviews your energy needs, confirms equipment availability, and prepares a clear
                                quote after the consultation request.
                            </p>
                            </details>

                            <details class="group py-4">
                            <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-bold text-neutral-950">
                                Return and exchange policy
                                <flux:icon.chevron-down class="size-4 transition group-open:rotate-180" />
                            </summary>
                            <p class="mt-4 text-sm leading-6 text-neutral-600">
                                Final terms depend on the proposal, selected equipment, deposits, and installation stage.
                            </p>
                            </details>
                        </div>

                        <div x-cloak x-show="activeTab === 'details'" role="tabpanel">
                            <livewire:product-engagement :equipment="$equipment" :reviews-only="false" />
                        </div>

                        <div x-cloak x-show="activeTab === 'reviews'" role="tabpanel">
                            <livewire:product-engagement :equipment="$equipment" :reviews-only="true" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto mt-16 max-w-7xl border-t border-neutral-200 pt-10">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-2xl font-bold">Related solutions</h2>
                <a href="{{ route('solutions') }}" class="text-sm font-semibold text-blue-700">View all solutions</a>
            </div>
            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($relatedEquipment as $related)
                    <x-equipment-card :equipment="$related" :interactive="false" />
                @empty
                    <p class="text-sm text-neutral-500">No related solutions are currently available.</p>
                @endforelse
            </div>
        </section>
    </main>
</x-layouts.base>
