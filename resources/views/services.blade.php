@section('title', 'Services')
@section('description', 'Unique equipment solutions, operators, logistics and parts — tailored for Caribbean projects.')
@section('keywords', 'equipment rental, heavy equipment, operators, parts, transport, Caribbean')

<x-layouts.base title="Services" description="" keywords="" canonical-url="{{ url()->current() }}">
    <section class="relative overflow-hidden bg-white">
        <!-- SPLIT HERO: large, asymmetric hero that reads differently from the rest of the site -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-6 items-center py-20 px-6 md:px-8">
            <!-- Left: Eyebrow + Headline + CTA -->
            <div class="md:col-span-6 z-10">
                <p class="inline-block text-sm font-semibold text-yellow-600 uppercase mb-4">FIELD-FIRST SOLUTIONS</p>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-neutral-900 mb-4">
                    Heavy equipment & crews — designed for the job, not the brochure.
                </h1>
                <p class="text-neutral-700 mb-6 max-w-lg">
                    We plan mobilization, match the right machines and staff, and handle parts and repairs so your team
                    keeps
                    moving. Short notice? We specialize in rapid island mobilization.
                </p>

                <div class="flex gap-3 mb-6">
                    <a href="#spotlight"
                        class="inline-flex items-center px-5 py-3 bg-yellow-500 text-neutral-900 font-semibold rounded-lg shadow hover:bg-yellow-400 transition">See
                        spotlight</a>
                    <a href="#quote"
                        class="inline-flex items-center px-4 py-3 border border-neutral-200 rounded-lg text-sm text-neutral-700 hover:bg-neutral-50 transition">Quick
                        quote</a>
                </div>

                <div class="flex gap-6 text-sm text-neutral-600">
                    <div>
                        <div class="text-2xl font-bold text-neutral-900">40+</div>
                        <div class="text-xs">Units available</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-neutral-900">95%</div>
                        <div class="text-xs">On-time completion</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-neutral-900">24/7</div>
                        <div class="text-xs">Emergency support</div>
                    </div>
                </div>
            </div>

            <!-- Right: Angled image block for uniqueness -->
            <div class="md:col-span-6 relative h-80 md:h-[420px]">
                <div
                    class="absolute inset-0 transform -skew-y-2 md:-skew-y-6 md:translate-x-8 bg-gradient-to-tr from-neutral-50 to-transparent rounded-lg shadow-lg">
                </div>
                <img src="https://images.unsplash.com/photo-1542293787938-c9e299b8806f?auto=format&fit=crop&w=1400&q=60"
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

        <!-- SPOTLIGHT / CASE STUDY -->
        <div id="spotlight" class="max-w-6xl mx-auto px-6 md:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <div class="md:col-span-2">
                    <h3 class="text-2xl font-bold mb-3">Spotlight — Port Works Turnaround</h3>
                    <p class="text-neutral-700 mb-4">When a port client faced a delayed tidal dredge, we supplied a
                        mixed fleet, two certified operators, and 48-hour parts mobilization. Project completed 6 days
                        ahead of the revised schedule.</p>
                    <div class="flex gap-4 text-sm text-neutral-600">
                        <div><strong class="text-neutral-900 block">Outcome</strong> Reduced downtime by 72%</div>
                        <div><strong class="text-neutral-900 block">Scope</strong> Dredging support, haulage, parts
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-100">
                        <h4 class="text-sm font-semibold mb-2">Quick facts</h4>
                        <ul class="text-sm text-neutral-700 space-y-2">
                            <li>• 2 operators embedded</li>
                            <li>• 5 pieces of heavy equipment</li>
                            <li>• Parts flown in within 36 hours</li>
                        </ul>
                        <a href="#quote"
                            class="mt-4 inline-block text-sm font-medium text-yellow-600 hover:underline">Tell us about
                            your project →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOW IT WORKS (timeline) -->
        <div class="max-w-5xl mx-auto px-6 md:px-8 py-12">
            <h3 class="text-xl font-bold text-center mb-6">How we work — four steps</h3>
            <ol class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <li class="p-6 bg-white rounded-xl shadow">
                    <div
                        class="mb-3 inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 font-bold">
                        1</div>
                    <h5 class="font-semibold mb-1">Plan</h5>
                    <p class="text-sm text-neutral-600">Site review & equipment mix.</p>
                </li>
                <li class="p-6 bg-white rounded-xl shadow">
                    <div
                        class="mb-3 inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 font-bold">
                        2</div>
                    <h5 class="font-semibold mb-1">Mobilize</h5>
                    <p class="text-sm text-neutral-600">Transport, permits & logistics.</p>
                </li>
                <li class="p-6 bg-white rounded-xl shadow">
                    <div
                        class="mb-3 inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 font-bold">
                        3</div>
                    <h5 class="font-semibold mb-1">Operate</h5>
                    <p class="text-sm text-neutral-600">Skilled operators meet milestones.</p>
                </li>
                <li class="p-6 bg-white rounded-xl shadow">
                    <div
                        class="mb-3 inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 font-bold">
                        4</div>
                    <h5 class="font-semibold mb-1">Support</h5>
                    <p class="text-sm text-neutral-600">Parts, repairs & reporting.</p>
                </li>
            </ol>
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
                <div class="md:col-span-2 bg-white p-6 rounded-xl shadow">
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

        <!-- SIMPLE CLIENT STRIP (no marquee, compact logos) -->
        <div class="max-w-7xl mx-auto px-6 md:px-8 pb-20">
            <div class="flex items-center gap-8 overflow-x-auto no-scrollbar py-6">
                <img src="https://via.placeholder.com/140x40?text=Client+1" class="h-10 object-contain" alt="client">
                <img src="https://via.placeholder.com/140x40?text=Client+2" class="h-10 object-contain" alt="client">
                <img src="https://via.placeholder.com/140x40?text=Client+3" class="h-10 object-contain" alt="client">
                <img src="https://via.placeholder.com/140x40?text=Client+4" class="h-10 object-contain" alt="client">
            </div>
        </div>

    </section>
</x-layouts.base>