<x-layouts.base>
    <section class="relative overflow-hidden py-32">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-6 items-center py-20 px-6 md:px-8">
            <div class="md:col-span-6 z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-neutral-900 mb-4">
                    Heavy equipment & crews — designed for the job, not the brochure.
                </h1>
            </div>

            <div class="md:col-span-6 relative h-80 md:h-[420px]">
                <div
                    class="absolute inset-0 transform -skew-y-2 md:-skew-y-6 md:translate-x-8 bg-gradient-to-tr from-general to-transparent rounded-lg shadow-lg">
                </div>
                <img src="https://images.unsplash.com/photo-1655037477606-0e2cdfe37066?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGhlYXZ5JTIwZXF1aXBtZW50fGVufDB8fDB8fHww"
                    alt="equipment" class="relative w-full h-full object-cover rounded-lg shadow-md">
                <!-- small badge -->
                <span
                    class="absolute top-6 left-6 bg-white/90 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">Mobilize
                    in 48–72h</span>
            </div>
        </div>

        <!-- ASYMMETRIC SERVICES MOSAIC -->
        <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-6">
                <!-- Big card -->
                <div
                    class="lg:col-span-5 bg-neutral-900 text-white p-8 rounded-2xl shadow-lg flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Flagship: Site Support Program</h3>
                        <p class="text-neutral-200 mb-4">Dedicated fleet + operator + parts allowance bundled for
                            long-running projects. One point of contact, one invoice — scaled to your site.</p>
                        <ul class="text-sm text-neutral-300 space-y-2 mb-6">
                            <li>• Dedicated fleet rotation and preventative maintenance</li>
                            <li>• On-site operator rotation and safety briefings</li>
                            <li>• Monthly reporting & fuel/logistics tracking</li>
                        </ul>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="#quote"
                            class="inline-block px-4 py-2 bg-yellow-500 text-neutral-900 rounded-md font-semibold">Get
                            program pricing</a>
                        <a href="#spotlight" class="text-sm underline text-neutral-200">Case study →</a>
                    </div>
                </div>

                <!-- Small tiles -->
                <div class="lg:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Rentals on demand</h4>
                        <p class="text-sm text-neutral-600">Dozers, excavators, rollers and support equipment available
                            by the day or project.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Operators & training</h4>
                        <p class="text-sm text-neutral-600">Certified operators and short upskill courses for client
                            crews.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Parts & repairs</h4>
                        <p class="text-sm text-neutral-600">Fast sourcing and field repair to reduce downtime.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Transport & permits</h4>
                        <p class="text-sm text-neutral-600">Heavy-lift coordination and permitting assistance for island
                            work.</p>
                    </div>
                </div>
            </div>
        </div>



        <!-- QUICK QUOTE & FAQ (interactive via Alpine) -->
        <div id="quote" class="max-w-6xl mx-auto px-6 md:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Quote estimator (left) -->
                <div class="md:col-span-1 bg-white p-6 rounded-xl shadow">
                    <h4 class="font-semibold mb-3">Quick quote</h4>
                    <form x-data="{ machines: 1, days: 7 }" x-on:submit.prevent>
                        <label class="text-xs text-neutral-600 block mb-1">Machines</label>
                        <input type="range" min="1" max="20" x-model.number="machines" class="w-full mb-3">
                        <div class="flex justify-between text-xs text-neutral-500 mb-3"><span>x <span
                                    x-text="machines"></span> machines</span><span><span x-text="days"></span>
                                days</span></div>

                        <label class="text-xs text-neutral-600 block mb-1">Days</label>
                        <input type="range" min="1" max="90" x-model.number="days" class="w-full mb-4">

                        <div class="mb-4">
                            <div class="text-sm text-neutral-700">Estimated mobilization: <span class="font-medium"
                                    x-text="machines > 5 ? '48–72 hours' : '24–48 hours'"></span></div>
                            <div class="text-sm text-neutral-700">Rough cost estimate: <span
                                    class="font-bold text-neutral-900"
                                    x-text="(machines * days * 1200).toLocaleString()"></span> JMD</div>
                        </div>

                        <a href="mailto:info@yourcompany.com?subject=Quick%20Quote"
                            class="inline-block px-4 py-2 bg-yellow-500 text-neutral-900 rounded-md font-semibold">Request
                            full quote</a>
                    </form>
                </div>

                <!-- FAQ accordion (right) -->
                <div class="md:col-span-2 bg-white p-6 rounded-xl py-20 shadow">
                    <h4 class="font-semibold mb-4">Frequently asked</h4>
                    <div x-data="{ open: 0 }" class="space-y-3">
                        <div class="border rounded-lg overflow-hidden">
                            <button @click="open = (open === 1 ? 0 : 1)"
                                class="w-full flex items-center justify-between px-4 py-3 text-left">
                                <span class="font-medium">How fast can you mobilize to Kingston?</span>
                                <span x-show="open !== 1" class="text-neutral-400">+</span>
                                <span x-show="open === 1" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 1" x-cloak class="px-4 pb-4 text-sm text-neutral-600">Typical
                                mobilization to Kingston is 24–48 hours for common units; specialized gear may take
                                48–72h.</div>
                        </div>

                        <div class="border rounded-lg overflow-hidden">
                            <button @click="open = (open === 2 ? 0 : 2)"
                                class="w-full flex items-center justify-between px-4 py-3 text-left">
                                <span class="font-medium">Do you provide operators?</span>
                                <span x-show="open !== 2" class="text-neutral-400">+</span>
                                <span x-show="open === 2" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 2" x-cloak class="px-4 pb-4 text-sm text-neutral-600">Yes — we supply
                                certified operators for short- and long-term engagements, with safety briefings on day
                                one.</div>
                        </div>

                        <div class="border rounded-lg overflow-hidden">
                            <button @click="open = (open === 3 ? 0 : 3)"
                                class="w-full flex items-center justify-between px-4 py-3 text-left">
                                <span class="font-medium">What happens in an emergency?</span>
                                <span x-show="open !== 3" class="text-neutral-400">+</span>
                                <span x-show="open === 3" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 3" x-cloak class="px-4 pb-4 text-sm text-neutral-600">We operate a
                                24/7 emergency line with rapid parts and field technician dispatches to minimize
                                downtime.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>