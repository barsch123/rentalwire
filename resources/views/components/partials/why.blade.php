<section x-data="{ animate: false }" class="py-10 px-6 md:px-12 lg:px-24 text-neutral-800">
    <div class="max-w-7xl mx-auto">
        <!-- Title Section -->
        <div class="container mx-auto px-4 relative my-4">
            <!-- Background Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-50 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                class="section-title absolute inset-0 md:text-6xl lg:text-7xl text-5xl font-extrabold  border-gray-200 opacity-50 uppercase tracking-wide leading-none">
                WHY CHOOSE PENGUIN?
            </h2>

            <!-- Foreground Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate
                    ?
                    'opacity-100 translate-x-0 transition duration-700' :
                    'opacity-0 translate-x-10'"
                class="relative text-4xl md:text-5xl font-extrabold text-gray-900">
                WHY CHOOSE <span class="block text-yellow-500 border-b-4 border-yellow-500 w-max"> PENGUIN?</span>
            </h2>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            @php
                $features = [
                    [
                        'icon' => 'fa-wrench',
                        'title' => 'Well-Maintained Equipment',
                        'desc' => 'Regular servicing and maintenance ensures reliable performance on every project.',
                    ],
                    [
                        'icon' => 'fa-user-tie',
                        'title' => 'Experienced Operators',
                        'desc' => 'Skilled professionals with extensive project management expertise.',
                    ],
                    [
                        'icon' => 'fa-map-marked-alt',
                        'title' => 'Islandwide Service',
                        'desc' => 'Comprehensive coverage throughout the Caribbean region.',
                    ],
                    [
                        'icon' => 'fa-shield-alt',
                        'title' => 'Fully Licensed & Insured',
                        'desc' => 'Complete peace of mind with comprehensive insurance coverage.',
                    ],
                ];
            @endphp

            @foreach ($features as $feature)
                <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }"
                    :class="animate
                        ?
                        'opacity-100 translate-x-0 transition duration-700' :
                        'opacity-0 translate-x-10'"
                    class="bg-white/90 backdrop-blur-lg p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="flex items-center justify-center bg-yellow-500 text-white rounded-full w-16 h-16 mb-6 shadow-md">
                        <i class="fas {{ $feature['icon'] }} text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- CTA Button -->
        <div class="w-full flex justify-center py-10" x-data="{ animate: false }" x-intersect:enter="animate = true"
            x-intersect:leave="animate = false" x-intersect:options="{ threshold: 0.5 }"
            :class="animate
                ?
                'opacity-100 translate-y-0 transition duration-700' :
                'opacity-0 translate-y-10'">
            <a class="relative inline-flex items-center justify-center gap-2 rounded-sm bg-[#ffab00] px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600
   before:absolute before:-z-10 before:top-1 before:left-1 before:w-full before:h-full before:rounded-sm before:bg-neutral-800
    before:opacity-0 before:transition-opacity before:duration-300 hover:before:opacity-100"
                href="#">
                <span class="relative z-10">LEARN MORE</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 h-4 w-4" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            {{-- <button class="bg-[#ffab00] hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg text-lg">
            Request Quote
        </button> --}}
        </div>
    </div>
</section>
