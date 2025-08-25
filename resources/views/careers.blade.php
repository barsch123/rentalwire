<x-layouts.base>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <!-- Hero Section -->
        <div class="text-center mb-16 md:mb-24 relative">
            <div class="px-4 relative py-10">
                <!-- Background Title -->
                <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }"
                    :class="animate ? 'opacity-50 -translate-x-0 transition duration-700' : 'opacity-0 -translate-x-10'"
                    class="flex section-title absolute inset-0 items-center justify-end md:text-7xl text-5xl font-extrabold text-gray-200 opacity-50 uppercase tracking-wide leading-none select-none">
                    OPPORTUNITIES
                </h2>
                <!-- Foreground Title -->
                <h2 x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }" x-data="{ animate: false }"
                    :class="animate ? 'opacity-100 translate-y-0 transition duration-700' : 'opacity-0 -translate-y-10'"
                    class="relative translate-y-7 text-3xl md:text-5xl font-extrabold text-neutral-800 flex justify-end">
                    <span class="border-b-4 border-yellow-500 pb-2">CAREERS</span>
                </h2>
            </div>

            <div x-data="{ animate: false }" x-intersect:enter="animate = true"
                :class="animate ? 'opacity-100 translate-y-0 transition-all duration-700 delay-200' : 'opacity-0 translate-y-6'"
                class="mt-8 flex justify-center space-x-4">
                <a href="#positions"
                    class="px-6 py-3 bg-yellow-500 text-neutral-900 font-semibold rounded-lg hover:bg-yellow-400 transition-colors shadow-md">
                    View Open Positions
                </a>
                <a href="#apply"
                    class="px-6 py-3 border border-neutral-300 text-neutral-700 font-semibold rounded-lg hover:bg-neutral-50 transition-colors">
                    Apply Now
                </a>
            </div>
        </div>

        <!-- Job Listings -->
        <div id="positions" class="mb-16 md:mb-24">
            <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 text-center mb-4">Open Positions</h3>
            <p class="text-neutral-600 text-center max-w-2xl mx-auto mb-12">Join our talented team and help us deliver
                exceptional equipment solutions across the Caribbean.</p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Job Card 1 -->
                <div
                    class="bg-white border border-neutral-200 rounded-xl shadow-sm hover:shadow-lg transition-all p-6 flex flex-col group">
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-xl font-bold text-neutral-900">Equipment Operator</h4>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Full-time</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-neutral-600 mb-4">
                            <span class="flex items-center"><i
                                    class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Various Sites</span>
                            <span class="flex items-center"><i class="fas fa-clock mr-2 text-yellow-500"></i>Day
                                Shift</span>
                        </div>
                        <p class="text-neutral-600 mb-4">

                            Operate heavy machinery to support excavation, grading, and material handling. Looking for
                            skilled individuals with a safety-first mindset.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Heavy
                                Equipment</span>
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Safety
                                Certified</span>
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Experience
                                Required</span>
                        </div>
                    </div>
                    <a href="#apply"
                        class="mt-6 inline-flex items-center justify-between px-4 py-2 bg-neutral-900 text-white font-medium rounded-lg hover:bg-yellow-500 hover:text-neutral-900 transition-colors group-hover:bg-yellow-500 group-hover:text-neutral-900">
                        <span>Apply Now</span>
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Job Card 2 -->
                <div
                    class="bg-white border border-neutral-200 rounded-xl shadow-sm hover:shadow-lg transition-all p-6 flex flex-col group">
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-xl font-bold text-neutral-900">Sales Representative</h4>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Full-time</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-neutral-600 mb-4">
                            <span class="flex items-center"><i
                                    class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Kingston, Jamaica</span>
                            <span class="flex items-center"><i
                                    class="fas fa-clock mr-2 text-yellow-500"></i>Flexible</span>
                        </div>
                        <p class="text-neutral-600 mb-4">
                            Drive business growth through client outreach and equipment rental solutions. Ideal for
                            motivated, customer-oriented professionals.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Sales
                                Experience</span>
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Customer
                                Relations</span>
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Commission</span>
                        </div>
                    </div>
                    <a href="#apply"
                        class="mt-6 inline-flex items-center justify-between px-4 py-2 bg-neutral-900 text-white font-medium rounded-lg hover:bg-yellow-500 hover:text-neutral-900 transition-colors group-hover:bg-yellow-500 group-hover:text-neutral-900">
                        <span>Apply Now</span>
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Job Card 3 -->
                <div
                    class="bg-white border border-neutral-200 rounded-xl shadow-sm hover:shadow-lg transition-all p-6 flex flex-col group">
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-xl font-bold text-neutral-900">Maintenance Specialist</h4>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Full-time</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-neutral-600 mb-4">
                            <span class="flex items-center"><i
                                    class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Kingston, Jamaica</span>
                            <span class="flex items-center"><i class="fas fa-clock mr-2 text-yellow-500"></i>Day
                                Shift</span>
                        </div>
                        <p class="text-neutral-600 mb-4">
                            Maintain and repair construction equipment to ensure peak performance. Seeking experienced
                            mechanics with strong troubleshooting skills.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Mechanical</span>
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Diagnostics</span>
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Certified</span>
                        </div>
                    </div>
                    <a href="#apply"
                        class="mt-6 inline-flex items-center justify-between px-4 py-2 bg-neutral-900 text-white font-medium rounded-lg hover:bg-yellow-500 hover:text-neutral-900 transition-colors group-hover:bg-yellow-500 group-hover:text-neutral-900">
                        <span>Apply Now</span>
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Additional Job Card -->
                <div
                    class="bg-white border border-neutral-200 rounded-xl shadow-sm hover:shadow-lg transition-all p-6 flex flex-col group">
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-xl font-bold text-neutral-900">Project Coordinator</h4>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Full-time</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-neutral-600 mb-4">
                            <span class="flex items-center"><i
                                    class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Montego Bay, Jamaica</span>
                            <span class="flex items-center"><i
                                    class="fas fa-clock mr-2 text-yellow-500"></i>Flexible</span>
                        </div>
                        <p class="text-neutral-600 mb-4">
                            Coordinate equipment deployment and project timelines. Ideal for organized professionals
                            with construction industry experience.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Project
                                Management</span>
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Communication</span>
                            <span
                                class="bg-neutral-100 text-neutral-700 px-3 py-1 rounded-full text-xs">Organization</span>
                        </div>
                    </div>
                    <a href="#apply"
                        class="mt-6 inline-flex items-center justify-between px-4 py-2 bg-neutral-900 text-white font-medium rounded-lg hover:bg-yellow-500 hover:text-neutral-900 transition-colors group-hover:bg-yellow-500 group-hover:text-neutral-900">
                        <span>Apply Now</span>
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Application Section -->
        <div class="mt-6">
            <livewire:career-form />
        </div>
    </section>
</x-layouts.base>