<x-layouts.base>
    @section('title', 'Checkout | Solara')
    @section('description', 'Complete your solar product checkout and review your order summary.')

    <main x-data="{ step: 1, summaryOpen: false }" x-on:keydown.escape.window="summaryOpen = false"
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
                        x-bind:class="step >= 1 ? 'text-neutral-950' : 'text-neutral-500'">Cart</button>
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
                        x-bind:class="step >= 2 ? 'text-neutral-950' : 'text-neutral-500'">Checkout</button>
                </li>
                <li class="mt-3 h-px" x-bind:class="step >= 3 ? 'bg-neutral-950' : 'bg-neutral-300'"></li>
                <li class="flex flex-col items-center gap-2">
                    <button type="button" x-on:click="step = 3"
                        class="flex size-6 items-center justify-center rounded-full text-base font-semibold transition"
                        x-bind:class="step >= 3 ? 'bg-neutral-950 text-white' : 'bg-neutral-200 text-neutral-500'">3</button>
                    <button type="button" x-on:click="step = 3" class="text-base font-semibold"
                        x-bind:class="step >= 3 ? 'text-neutral-950' : 'text-neutral-700'">Order</button>
                </li>
            </ol>

            <button type="button" x-on:click="summaryOpen = true"
                class="mt-8 inline-flex items-center gap-2 rounded-md border border-neutral-300 bg-white px-4 py-2.5 text-base font-semibold text-neutral-800 transition hover:border-neutral-950 lg:hidden">
                <flux:icon.shopping-bag class="size-4" />
                View summary
            </button>
        </div>

        <div class="mx-auto grid max-w-6xl gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[minmax(0,1fr)_22rem] lg:items-start">
            <section>
                <div x-show="step === 1" x-transition.opacity>
                    <livewire:cart-items />
                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('rentals') }}" wire:navigate
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

                <form x-show="step === 2" x-transition.opacity class="space-y-10" x-on:submit.prevent>
                    <div>
                        <h1 class="text-2xl font-bold text-neutral-950">Delivery Details</h1>

                        <div class="mt-7 grid gap-6 sm:grid-cols-2">
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                First Name
                                <input type="text" placeholder="John"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Last Name
                                <input type="text" placeholder="Doe"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Email
                                <input type="email" placeholder="john@solara.example"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Mobile Number
                                <input type="tel" placeholder="123-456-7890"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Address Line
                                <input type="text" placeholder="123 Main Street"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                City
                                <input type="text" placeholder="Kingston"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Parish / State
                                <input type="text" placeholder="St. Andrew"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                            <label class="grid gap-2 text-base font-semibold text-neutral-950">
                                Postal code
                                <input type="text" placeholder="00000"
                                    class="rounded-md border border-neutral-300 bg-white px-3 py-3 text-base font-normal text-neutral-950 outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            </label>
                        </div>
                    </div>

                   <fieldset class="mt-12">
                                <legend class="text-xl text-slate-900 font-semibold mb-6 ">Payment
                                    method
                                </legend>
                                <div class="grid gap-4 lg:grid-cols-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="method" id="card"
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
                                        <input type="radio" name="method" id="paypal"
                                            class="w-[18px] h-[18px] appearance-none rounded-full border border-slate-300 bg-white focus:outline-blue-500 checked:ring-2 checked:ring-inset checked:ring-white checked:bg-blue-600 dark:checked:ring-neutral-900 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-600" />
                                        <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
                                            <img src="https://readymadeui.com/images/paypal.webp" class="w-20"
                                                alt="paypalCard" />
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                    <div>
                        <label class="text-base font-semibold text-neutral-950" for="promo-code">Do you have a promo code?</label>
                        <div class="mt-3 flex max-w-md gap-3">
                            <input id="promo-code" type="text" placeholder="Enter promo code"
                                class="min-w-0 flex-1 rounded-md border border-neutral-300 bg-white px-3 py-3 text-base outline-none transition placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-2 focus:ring-neutral-950/10">
                            <button type="button" class="rounded-md bg-neutral-950 px-5 py-3 text-base font-semibold text-white transition hover:bg-neutral-800">
                                Apply
                            </button>
                        </div>
                    </div>

                    <button type="button" x-on:click="step = 1; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="inline-flex items-center gap-2 rounded-md border border-neutral-300 px-5 py-3 text-base font-semibold text-neutral-800 transition hover:border-neutral-950">
                        <flux:icon.arrow-left class="size-4" />
                        Back to cart
                    </button>
                </form>

                <section x-show="step === 3" x-transition.opacity class="rounded-lg border border-neutral-200 bg-neutral-50 p-8">
                    <div class="flex size-12 items-center justify-center rounded-full bg-neutral-950 text-white">
                        <flux:icon.check class="size-6" />
                    </div>
                    <h1 class="mt-6 text-2xl font-bold text-neutral-950">Order received</h1>
                    <p class="mt-3 max-w-xl text-base leading-7 text-neutral-600">
                        Your solar product order has been staged. Our team will confirm delivery, installation, and final availability details.
                    </p>
                    <button type="button" x-on:click="step = 1" class="mt-6 rounded-md border border-neutral-300 px-5 py-3 text-base font-semibold text-neutral-800 transition hover:border-neutral-950">
                        Review cart
                    </button>
                </section>
            </section>

            <livewire:order-summary />
        </div>
    </main>
</x-layouts.base>
