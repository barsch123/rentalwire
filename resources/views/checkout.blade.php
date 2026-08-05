<x-layouts.base>
    @section('title', 'Checkout | Solara')
    @section('description', 'Complete your solar product checkout and review your order summary.')
    @section('keywords', 'solar estimate, solar checkout, Solara solutions, Jamaica')

    <main x-data="{ step: {{ session('order_completed') ? 3 : 1 }}, summaryOpen: false }" x-on:keydown.escape.window="summaryOpen = false"
        class="min-h-screen bg-white py-32  text-neutral-950">
        <div x-cloak x-show="summaryOpen" x-transition.opacity class="fixed inset-0 z-40 bg-neutral-950/40 lg:hidden"
            x-on:click="summaryOpen = false"></div>

        <div class="mx-auto max-w-6xl px-5 sm:px-8">
            <ol class="grid grid-cols-[auto_minmax(0,1fr)_auto_minmax(0,1fr)_auto] items-start gap-3">
                <li class="flex flex-col items-center gap-2">
                    <button type="button" x-on:click="step = 1"
                        class="flex size-6 items-center justify-center rounded-full transition"
                        x-bind:class="step >= 1 ? 'bg-neutral-950 text-white' : 'bg-neutral-200 text-neutral-500'">
                        <template x-if="step > 1"><flux:icon.check class="size-4" /></template>
                        <span x-show="step === 1" class="size-2 rounded-full bg-current"></span>
                    </button>
                    <button type="button" x-on:click="step = 1" class="text-base font-semibold"
                        x-bind:class="step >= 1 ? 'text-neutral-950' : 'text-neutral-500'">{{ __('Cart') }}</button>
                </li>
                <li class="mt-3 h-px" x-bind:class="step >= 2 ? 'bg-neutral-950' : 'bg-neutral-300'"></li>
                <li class="flex flex-col items-center gap-2">
                    <button type="button" x-on:click="step = 2"
                        class="flex size-6 items-center justify-center rounded-full transition"
                        x-bind:class="step >= 2 ? 'bg-neutral-950 text-white' : 'bg-neutral-200 text-neutral-500'">
                        <template x-if="step > 2"><flux:icon.check class="size-4" /></template>
                        <span x-show="step === 2" class="size-2 rounded-full bg-current"></span>
                        <span x-show="step < 2" class="text-base font-semibold">2</span>
                    </button>
                    <button type="button" x-on:click="step = 2" class="text-base font-semibold"
                        x-bind:class="step >= 2 ? 'text-neutral-950' : 'text-neutral-500'">{{ __('Checkout') }}</button>
                </li>
                <li class="mt-3 h-px" x-bind:class="step >= 3 ? 'bg-neutral-950' : 'bg-neutral-300'"></li>
                <li class="flex flex-col items-center gap-2">
                    <button type="button" x-on:click="step = 3"
                        class="flex size-6 items-center justify-center rounded-full text-base font-semibold transition"
                        x-bind:class="step >= 3 ? 'bg-neutral-950 text-white' : 'bg-neutral-200 text-neutral-500'">3</button>
                    <button type="button" x-on:click="step = 3" class="text-base font-semibold"
                        x-bind:class="step >= 3 ? 'text-neutral-950' : 'text-neutral-700'">{{ __('Order') }}</button>
                </li>
            </ol>

            <button type="button" x-on:click="summaryOpen = true"
                class="mt-8 inline-flex items-center gap-2 rounded-md border border-neutral-300 bg-white px-4 py-2.5 text-base font-semibold text-neutral-800 transition hover:border-neutral-950 lg:hidden">
                <flux:icon.shopping-bag class="size-4" />
                {{ __('View summary') }}
            </button>
        </div>

        <div class="mx-auto grid max-w-6xl gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[minmax(0,1fr)_22rem] lg:items-start">
            <section>
                <div x-show="step === 1" x-transition.opacity>
                    <livewire:cart-items />
                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('solutions') }}" wire:navigate
                            class="inline-flex items-center justify-center gap-2 rounded-md border border-neutral-300 px-5 py-3 text-base font-semibold text-neutral-800 transition hover:border-neutral-950">
                            <flux:icon.arrow-left class="size-4" />
                            Continue shopping
                        </a>
                        <button type="button" x-on:click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-neutral-950 px-5 py-3 text-base font-semibold text-white transition hover:bg-neutral-800">
                            Continue to checkout
                            <flux:icon.arrow-right class="size-4" />
                        </button>
                    </div>
                </div>

                <form method="POST" action="{{ route('checkout.complete') }}" x-show="step === 2" x-transition.opacity class="space-y-10">
                    @csrf
                    @php
                        $customerName = trim((string) auth()->user()?->name);
                        $customerNameParts = preg_split('/\s+/', $customerName) ?: [];
                        $customerFirstName = $customerNameParts[0] ?? '';
                        $customerLastName = implode(' ', array_slice($customerNameParts, 1));
                        $savedDeliveryDetails = auth()->user();
                    @endphp
                    <div>
                        <h1 class="text-2xl font-bold text-neutral-950">{{ __('Delivery Details') }}</h1>

                        <div class="mt-7 grid gap-6 sm:grid-cols-2">
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('First Name') }}
                                <input type="text" name="first_name" value="{{ auth()->check() ? old('first_name', $savedDeliveryDetails->delivery_first_name ?: $customerFirstName) : old('first_name') }}" placeholder="John" required @if (auth()->check()) readonly @endif
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Last Name') }}
                                <input type="text" name="last_name" value="{{ auth()->check() ? old('last_name', $savedDeliveryDetails->delivery_last_name ?: $customerLastName) : old('last_name') }}" placeholder="Doe" required @if (auth()->check()) readonly @endif
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Email') }}
                                <input type="email" name="email" value="{{ auth()->user()?->email ?? old('email') }}" placeholder="john@solara.example" required @if (auth()->check()) readonly @endif
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Mobile Number') }}
                                <input type="tel" name="mobile_number" value="{{ old('mobile_number', auth()->user()?->delivery_mobile_number) }}" placeholder="123-456-7890" required
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Address Line') }}
                                <input type="text" name="address" value="{{ old('address', auth()->user()?->delivery_address) }}" placeholder="123 Main Street" required
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('City') }}
                                <input type="text" name="city" value="{{ old('city', auth()->user()?->delivery_city) }}" placeholder="Kingston" required
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Parish / State') }}
                                <input type="text" name="parish" value="{{ old('parish', auth()->user()?->delivery_parish) }}" placeholder="St. Andrew" required
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                {{ __('Postal code') }}
                                <input type="text" name="postal_code" value="{{ old('postal_code', auth()->user()?->delivery_postal_code) }}" placeholder="00000" required
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                        </div>
                    </div>

                   <fieldset class="mt-12">
                                <legend class="mb-6 text-xl font-semibold text-slate-900">{{ __('Payment method') }}</legend>
                                <div class="grid gap-4 lg:grid-cols-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="card" id="card"
                                            class="w-[18px] h-[18px] appearance-none rounded-full border border-slate-300 bg-white focus:outline-blue-500 checked:ring-2 checked:ring-inset checked:ring-white checked:bg-blue-600 dark:checked:ring-neutral-900 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-600"
                                            checked />
                                        <label for="card" class="ml-4 flex gap-2 cursor-pointer">
                                            <img src="https://readymadeui.com/images/visa.webp" class="w-12"
                                                alt="visa" />
                                            <img src="https://readymadeui.com/images/american-express.webp" class="w-12"
                                                alt="american-express" />
                                            <img src="https://readymadeui.com/images/master.webp" class="w-12"
                                                alt="master" />
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="paypal" id="paypal"
                                            class="w-[18px] h-[18px] appearance-none rounded-full border border-slate-300 bg-white focus:outline-blue-500 checked:ring-2 checked:ring-inset checked:ring-white checked:bg-blue-600 dark:checked:ring-neutral-900 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-600" />
                                        <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
                                            <img src="https://readymadeui.com/images/paypal.webp" class="w-20"
                                                alt="paypalCard" />
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="cash_on_delivery" id="cash-on-delivery"
                                            class="h-[18px] w-[18px] appearance-none rounded-full border border-slate-300 bg-white focus:outline-blue-500 checked:ring-2 checked:ring-inset checked:ring-white checked:bg-blue-600 dark:checked:ring-neutral-900 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-600" />
                                        <label for="cash-on-delivery" class="ml-4 cursor-pointer text-base font-semibold text-slate-900">{{ __('Cash on delivery') }}</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="bitcoin" id="bitcoin"
                                            class="h-[18px] w-[18px] appearance-none rounded-full border border-slate-300 bg-white focus:outline-blue-500 checked:ring-2 checked:ring-inset checked:ring-white checked:bg-blue-600 dark:checked:ring-neutral-900 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-600" />
                                        <label for="bitcoin" class="ml-4 cursor-pointer text-base font-semibold text-slate-900">
                                            <span class="mr-1 text-orange-500">₿</span>{{ __('Bitcoin') }}
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                    <div>
                        <label class="text-base font-semibold text-neutral-950" for="promo-code">{{ __('Do you have a promo code?') }}</label>
                        <div class="mt-3 flex max-w-md gap-3">
                            @php
                                $membershipPromoCode = auth()->user()?->discount_percent > 0
                                    ? 'MEMBER-'.strtoupper(auth()->user()->membership_tier)
                                    : '';
                            @endphp
                            <input id="promo-code" name="promo_code" type="text" value="{{ old('promo_code', $membershipPromoCode) }}" placeholder="{{ __('Enter promo code') }}"
                                @if ($membershipPromoCode) readonly @endif
                                class="min-w-0 flex-1 rounded-md border border-neutral-300 bg-white px-3 py-3 text-base outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            <button type="button" class="rounded-md bg-neutral-950 px-5 py-3 text-base font-semibold text-white transition hover:bg-neutral-800">
                                {{ __('Apply') }}
                            </button>
                        </div>
                        @if ($membershipPromoCode)
                            <p class="mt-2 text-sm font-medium text-emerald-700">{{ ucfirst(auth()->user()->membership_tier) }} membership discount applied automatically.</p>
                        @endif
                    </div>

                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <button type="button" x-on:click="step = 1; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="inline-flex items-center gap-2 rounded-md border border-neutral-300 px-5 py-3 text-base font-semibold text-neutral-800 transition hover:border-neutral-950">
                        <flux:icon.arrow-left class="size-4" />
                        Back to cart
                    </button>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-md bg-neutral-950 px-5 py-3 text-base font-semibold text-white transition hover:bg-neutral-800">
                        Place order
                        <flux:icon.check class="size-4" />
                    </button>
                    </div>
                </form>

                <section x-show="step === 3" x-transition.opacity class="rounded-lg border border-neutral-200 bg-neutral-50 p-8">
                    <div class="flex size-12 items-center justify-center rounded-full bg-neutral-950 text-white">
                        <flux:icon.check class="size-6" />
                    </div>
                    <h1 class="mt-6 text-2xl font-bold text-neutral-950">{{ __('Order received') }}</h1>
                    <p class="mt-3 max-w-xl text-base leading-7 text-neutral-600">
                        {{ __('Your solar product order has been received. An invoice was sent to :email.', ['email' => session('invoice_email')]) }}
                    </p>
                    <p class="mt-2 text-sm font-semibold text-neutral-700">Order {{ session('order_number') }}</p>
                    <button type="button" x-on:click="step = 1" class="mt-6 rounded-md border border-neutral-300 px-5 py-3 text-base font-semibold text-neutral-800 transition hover:border-neutral-950">
                        {{ __('Review cart') }}
                    </button>
                </section>
            </section>

            <livewire:order-summary />
        </div>
    </main>
</x-layouts.base>
