{{-- @section('og:description', '')
@section('description', '')
@section('title', '')
@section('og:title', '')
@section('keywords', '') --}}

<x-layouts.base>
    <section class="py-24 md:px-0 px-6" x-data>
        <div class="px-4 relative py-10">
            <!-- Background Title -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-50 -translate-x-0 transition duration-700' : 'opacity-0 -translate-x-10'"
                class="flex section-title absolute inset-0 items-center justify-end md:text-7xl text-5xl font-extrabold text-gray-200 opacity-50 uppercase tracking-wide leading-none select-none">
                EXCELLENCE
            </h2>
            <!-- Foreground Title -->
            <h2 x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }" x-data="{ animate: false }"
                :class="animate ? 'opacity-100 translate-y-0 transition duration-700' : 'opacity-0 -translate-y-10'"
                class="relative translate-y-7 text-3xl md:text-5xl font-extrabold text-neutral-800 flex justify-end">
                <span class="border-b-4 border-yellow-500 pb-2">OUR STORY</span>
            </h2>
        </div>

        <!-- Page Content (single-page, no footer) -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Compact Hero Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center mb-16">
                <div>
                    <p class="text-sm font-semibold text-general uppercase mb-3">Trusted equipment & services</p>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-neutral-900 mb-4">
                        We move projects forward — safely and on time
                    </h1>
                    <p class="text-neutral-700 leading-relaxed mb-6 max-w-xl">
                        We partner with contractors, municipalities, and developers across the Caribbean to provide
                        reliable heavy-equipment, experienced operators, and tailored logistics — from single-day
                        rentals to multi-month site programs.
                    </p>


                </div>

                <!-- Visual mosaic -->
                <div class="grid grid-cols-2 grid-rows-2 gap-3 h-80">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1605152276897-4f618f831968?auto=format&fit=crop&w=800&q=60"
                            alt="equipment" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md row-span-2">
                        <img src="https://images.unsplash.com/photo-1580901369227-308f6f40bdeb?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.1.0"
                            alt="team" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1595569099963-77bf7706643a?q=80&w=736&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="site" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Values (compact) -->
            <div class="py-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-neutral-900">Our Core Values</h2>
                    <p class="text-neutral-600 max-w-2xl mx-auto mt-2">Practical, accountable, people-first — we build
                        work that lasts.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-neutral-900 mb-2">Reliability</h4>
                        <p class="text-sm text-neutral-600">Equipment and crews you can rely on — consistently
                            maintained and safety-checked.</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A2 2 0 013 15.382V8.618a2 2 0 011.553-1.894L10 4" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-neutral-900 mb-2">Safety</h4>
                        <p class="text-sm text-neutral-600">Rigorous procedures and continuous training keep teams and
                            sites safe.</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M7 20h5V10" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-neutral-900 mb-2">Partnership</h4>
                        <p class="text-sm text-neutral-600">We coordinate closely with clients to meet timelines and
                            budgets.</p>
                    </div>
                </div>
            </div>

            <!-- Expertise / Services -->
            <div id="services" class="py-12 space-y-8">
                <div class="max-w-4xl mx-auto text-center mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-neutral-900">What we do</h2>
                    <p class="text-neutral-600 mt-2">Rentals, operators, transport and on-site support — tailored to
                        your project.</p>
                </div>

                <div class="max-w-4xl mx-auto space-y-6">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 3v2.25M9.75 3h4.5M4.5 8.25h15" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Equipment Rentals & Fleet</h3>
                            <p class="text-neutral-600">Flexible day-rates, weekly, and project-long rentals with
                                maintenance support.</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Operators & Training</h3>
                            <p class="text-neutral-600">Certified operators for short- or long-term assignments and
                                client upskilling.</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Logistics & Support</h3>
                            <p class="text-neutral-600">Transport, site setup, permitting assistance, and responsive
                                field support.</p>
                        </div>
                    </div>
                </div>
            </div>

        
            <!-- Small CTA (keeps page-focused — not a footer) -->
            <div class="mt-10 bg-yellow-50 rounded-lg p-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h4 class="text-lg font-bold text-neutral-900">Need equipment fast?</h4>
                    <p class="text-neutral-700 text-sm">We can mobilize crews and machines to most islands within 48–72
                        hours for urgent jobs.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{route('careers')}}" wire:navigate
                        class="px-4 py-2 bg-neutral-900 text-white rounded-lg">Careers</a>
                    <a href="{{route('services')}}" wire:navigate
                        class="px-4 py-2 border border-neutral-200 rounded-lg text-neutral-700">Our
                        Services</a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>