<div class="bg-neutral-800 p-4">
    <div class="container pt-20 mx-auto px-10 relative space-y-10 mb-10">
        <!-- Background Text with Intersection Animation -->
        <h2 class="section-title absolute inset-0 md:text-7xl text-5xl font-extrabold text-gray-200 uppercase tracking-wide leading-none"
            x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
            x-intersect:options="{ threshold: 0.5 }"
            :class="animate
                ?
                'opacity-50 translate-y-0 transition duration-700' :
                'opacity-0 translate-y-10'">
            THE BEST EQUIPMENT
        </h2>

        <!-- Foreground Text with Intersection Animation -->
        <h2 class="relative text-4xl md:text-5xl font-extrabold text-white" x-data="{ animate: false }"
            x-intersect:enter="animate = true" x-intersect:leave="animate = false"
            x-intersect:options="{ threshold: 0.5 }"
            :class="animate
                ?
                'opacity-100 translate-y-0 transition duration-700' :
                'opacity-0 translate-y-10'">
            VIEW OUR <span class="block text-yellow-500 border-b-4 border-yellow-500 w-max">EQUIPMENT</span>
        </h2>
    </div>
    <!-- Image Grid -->
    <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4">
        <template
            x-for="img in [
      { src: 'Bulldozer.png', alt: 'Bulldozer' },
      { src: 'eg1.png', alt: 'Example 1' },
      { src: 'eg2.png', alt: 'Example 2' },
      { src: 'Elevating Scraper.png', alt: 'Elevating Scraper' },
      { src: 'Motorgrader.png', alt: 'Motorgrader' },
      { src: 'ft.png', alt: 'FT' },
      { src: 'compactor.png', alt: 'Compactor' },
      { src: 'forklift.png', alt: 'Forklift' },
      { src: 'crane.png', alt: 'Crane' }
    ]"
            :key="img.src">
            <div x-data="{ visible: false }" x-intersect.once="visible = true"
                :class="visible
                    ?
                    'opacity-100 translate-y-0 transition duration-700' :
                    'opacity-0 translate-y-10'"
                class="mb-4 break-inside-avoid bg-white rounded-xl">
                <img class="w-full rounded-xl" :src="`{{ asset('img/') }}/${img.src}`" :alt="img.alt" />
            </div>
        </template>
    </div>

    <!-- Button Section -->
    <div class="w-full flex justify-center py-10" x-data="{ animate: false }" x-intersect.once="animate = true"
        :class="animate
            ?
            'opacity-100 translate-y-0 transition duration-700' :
            'opacity-0 translate-y-10'">
        <a class="relative inline-flex items-center justify-center gap-2 rounded-sm bg-yellow-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600 before:absolute before:-z-10 before:top-1 before:left-1 before:w-full before:h-full before:rounded-sm before:bg-white before:opacity-0 before:transition-opacity before:duration-300 hover:before:opacity-100"
            href="#">
            <span class="relative z-10">REQUEST A FREE QUOTE</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 h-4 w-4" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>
