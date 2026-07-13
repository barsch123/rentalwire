<x-layouts.base>
    @section('title', $equipment->name.' | Solara')
    @section('description', Str::limit($equipment->description, 150))

    @php
        $productImage = Str::startsWith($equipment->photo, 'http')
            ? $equipment->photo
            : asset('storage/'.$equipment->photo);
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

                        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm">
                            <span class="inline-flex items-center gap-1 rounded-md border border-neutral-200 bg-neutral-50 px-2.5 py-1 font-semibold text-neutral-700">
                                4 <i class="fas fa-star text-xs text-general"></i>
                            </span>
                            <span class="text-neutral-500">253 ratings and 27 reviews</span>
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
                                <flux:button type="submit" variant="primary" class="w-full rounded-md! py-5!">
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

                    <div class="divide-y divide-neutral-200">
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

                    <div class="border-t border-neutral-200 pt-5">
                        <h2 class="text-sm font-bold text-neutral-950">Customer Reviews</h2>
                        <div class="mt-4 flex items-center gap-3">
                            <div class="flex text-general">
                                @for ($star = 0; $star < 4; $star++)
                                    <i class="fas fa-star text-sm"></i>
                                @endfor
                                <i class="fas fa-star-half-stroke text-sm"></i>
                            </div>
                        </div>
                        <p class="mt-3 text-2xl font-bold text-neutral-950">
                            4.0 <span class="text-sm font-medium text-neutral-500">/ 5 Based on 253 ratings</span>
                        </p>

                        <div class="mt-5 flex gap-3">
                            <img src="{{ asset('img/user-1.jpg') }}" alt="John Doe" class="size-10 rounded-full object-cover">
                            <div>
                                <p class="text-sm font-bold text-neutral-950">John Doe</p>
                                <div class="mt-1 flex items-center gap-2 text-xs text-neutral-500">
                                    <span class="text-general">★ ★ ★ ★ ☆</span>
                                    <span>2 mins ago</span>
                                </div>
                                <p class="mt-2 max-w-xl text-sm leading-6 text-neutral-600">
                                    The consultation was clear, practical, and fast. The team explained the system options
                                    and what the installation process would require.
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" wire:navigate
                            class="mt-5 inline-flex text-sm font-semibold text-blue-600 hover:text-blue-700">
                            Ask about this solution
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.base>
