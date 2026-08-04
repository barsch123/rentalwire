<x-layouts.base
    title="Solar Services | Solara"
    description="Explore Solara's residential and commercial solar, battery storage, monitoring, and maintenance services across Jamaica."
    keywords="solar services Jamaica, residential solar, commercial solar, battery storage, Solara"
>
    <section class="relative overflow-hidden py-32">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-6 items-center py-20 px-6 md:px-8">
            <div class="md:col-span-6 z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-neutral-900 mb-4">
                    Solar solutions designed around your energy use, not a generic package.
                </h1>
            </div>

            <div class="md:col-span-6 relative h-80 md:h-[420px]">
                <div
                    class="absolute inset-0 transform -skew-y-2 md:-skew-y-6 md:translate-x-8 bg-gradient-to-tr from-general to-transparent rounded-lg shadow-lg">
                </div>
                <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80"
                    alt="solar panels" class="relative w-full h-full object-cover rounded-lg shadow-md">
                <!-- small badge -->
                <span
                    class="absolute top-6 left-6 bg-white/90 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">Mobilize
                    survey in 48-72h</span>
            </div>
        </div>

        <!-- ASYMMETRIC SERVICES MOSAIC -->
        <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-6">
                <!-- Big card -->
                <div
                    class="lg:col-span-5 bg-neutral-900 text-white p-8 rounded-2xl shadow-lg flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Flagship: Commercial Solar Program</h3>
                        <p class="text-neutral-200 mb-4">Solar array, inverter, battery, monitoring, and maintenance
                            bundled for businesses that need predictable energy savings.</p>
                        <ul class="text-sm text-neutral-300 space-y-2 mb-6">
                            <li>• Load analysis, production modeling, and system design</li>
                            <li>• Certified installation with inverter and battery commissioning</li>
                            <li>• Monthly performance reporting and preventative maintenance</li>
                        </ul>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="#quote"
                            class="inline-block rounded-md bg-general px-4 py-2 font-semibold text-neutral-950 transition hover:bg-yellow-500">Get
                            program pricing</a>
                        <a href="#spotlight" class="text-sm underline text-neutral-200">Case study →</a>
                    </div>
                </div>

                <!-- Small tiles -->
                <div class="lg:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Residential solar</h4>
                        <p class="text-sm text-neutral-600">Roof-mounted systems, hybrid inverters, and battery backup
                            sized for household usage.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Commercial solar</h4>
                        <p class="text-sm text-neutral-600">Energy audits, array design, and installation for offices,
                            shops, warehouses, and campuses.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Battery backup</h4>
                        <p class="text-sm text-neutral-600">Storage packages for critical loads, outage protection, and
                            better self-consumption.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="font-semibold mb-2">Maintenance plans</h4>
                        <p class="text-sm text-neutral-600">Panel cleaning, inverter checks, monitoring, and field
                            service to protect production.</p>
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
                    <form x-data="{ systemSize: 5, batteries: 1 }" x-on:submit.prevent>
                        <label class="text-xs text-neutral-600 block mb-1">System size (kW)</label>
                        <input type="range" min="3" max="100" x-model.number="systemSize" class="w-full mb-3">
                        <div class="flex justify-between text-xs text-neutral-500 mb-3"><span>x <span
                                    x-text="systemSize"></span> kW</span><span><span x-text="batteries"></span>
                                batteries</span></div>

                        <label class="text-xs text-neutral-600 block mb-1">Battery modules</label>
                        <input type="range" min="0" max="8" x-model.number="batteries" class="w-full mb-4">

                        <div class="mb-4">
                            <div class="text-sm text-neutral-700">Estimated survey window: <span class="font-medium"
                                    x-text="systemSize > 25 ? '48-72 hours' : '24-48 hours'"></span></div>
                            <div class="text-sm text-neutral-700">Rough cost estimate: <span
                                    class="font-bold text-neutral-900"
                                    x-text="((systemSize * 180000) + (batteries * 450000)).toLocaleString()"></span> JMD</div>
                        </div>

                        <a href="mailto:info@solara.example?subject=Quick%20Quote"
                            class="inline-block rounded-md bg-general px-4 py-2 font-semibold text-neutral-950 transition hover:bg-yellow-500">Request
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
                                <span class="font-medium">How fast can you complete a site assessment?</span>
                                <span x-show="open !== 1" class="text-neutral-400">+</span>
                                <span x-show="open === 1" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 1" x-cloak class="px-4 pb-4 text-sm text-neutral-600">Typical
                                assessments are usually scheduled within 24-48 hours; larger commercial sites may take
                                48-72 hours.</div>
                        </div>

                        <div class="border rounded-lg overflow-hidden">
                            <button @click="open = (open === 2 ? 0 : 2)"
                                class="w-full flex items-center justify-between px-4 py-3 text-left">
                                <span class="font-medium">Do you include battery backup?</span>
                                <span x-show="open !== 2" class="text-neutral-400">+</span>
                                <span x-show="open === 2" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 2" x-cloak class="px-4 pb-4 text-sm text-neutral-600">Yes, we design
                                battery options around your critical loads, budget, and backup time requirements.</div>
                        </div>

                        <div class="border rounded-lg overflow-hidden">
                            <button @click="open = (open === 3 ? 0 : 3)"
                                class="w-full flex items-center justify-between px-4 py-3 text-left">
                                <span class="font-medium">What happens after installation?</span>
                                <span x-show="open !== 3" class="text-neutral-400">+</span>
                                <span x-show="open === 3" class="text-neutral-400">−</span>
                            </button>
                            <div x-show="open === 3" x-cloak class="px-4 pb-4 text-sm text-neutral-600">We provide
                                monitoring, maintenance, warranty support, and field service to keep production on track.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>
