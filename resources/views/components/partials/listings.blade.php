<div class="bg-neutral-800 p-4">
    <div class="container pt-20 mx-auto px-10 relative space-y-10 mb-10">
         <div class="container mx-auto px-4 relative my-4">
            <!-- Background Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-50 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                class="text-gray-100 section-title absolute inset-0 md:text-6xl lg:text-7xl text-5xl font-extrabold  border-gray-200 opacity-50 uppercase tracking-wide leading-none">
                {{ __('CLEAN ENERGY OPTIONS') }}
            </h2>

            <!-- Foreground Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate
                    ?
                    'opacity-100 translate-x-0 transition duration-700' :
                    'opacity-0 translate-x-10'"
                class="text-white relative text-4xl md:text-5xl font-extrabold ">
                {{ __('VIEW OUR') }} <span class="block w-max border-b-4 border-general text-general"> {{ __('SOLUTIONS') }}</span>
            </h2>
        </div>
    </div>
    <!-- Image Grid -->
    <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4">
        <template
            x-for="img in [
      { src: 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80', alt: 'Residential rooftop solar panels' },
      { src: 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?auto=format&fit=crop&w=900&q=80', alt: 'Solar technician at work' },
      { src: 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=900&q=80', alt: 'Commercial solar array' },
      { src: 'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?auto=format&fit=crop&w=900&q=80', alt: 'Solar inverter system' },
      { src: 'https://images.unsplash.com/photo-1592833159155-c62df1b65634?auto=format&fit=crop&w=900&q=80', alt: 'Rooftop panel installation' },
      { src: 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=900&q=80', alt: 'Solar farm under blue sky' }
    ]"
            :key="img.src">
            <div x-data="{ visible: false }" x-intersect.once="visible = true"
                :class="visible
                    ?
                    'opacity-100 translate-y-0 transition duration-700' :
                    'opacity-0 translate-y-10'"
                class="mb-4 break-inside-avoid bg-white rounded-xl">
                <img class="w-full rounded-xl" :src="img.src" :alt="img.alt" />
            </div>
        </template>
    </div>

    <!-- Button Section -->
    <div class="w-full flex justify-center py-10" x-data="{ animate: false }" x-intersect.once="animate = true"
        :class="animate
            ?
            'opacity-100 translate-y-0 transition duration-700' :
            'opacity-0 translate-y-10'">
        <a class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 rounded-sm!"
            href="{{ route('contact') }}">
            <span class="relative z-10">{{ __('REQUEST A FREE QUOTE') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 h-4 w-4" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>
