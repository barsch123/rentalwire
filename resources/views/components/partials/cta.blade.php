<section class="mx-auto py-24">
    <div
        class="mx-auto flex w-full flex-col items-center justify-center sm:max-w-screen-sm md:max-w-screen-md lg:flex-row">
        <div class="text-center">
            <p class="bg-neutral-800 bg-clip-text text-4xl font-extrabold text-transparent sm:text-6xl">
                Get started with your next project</p>
            <div class="w-full flex justify-center py-10" x-data="{ animate: false }" x-intersect:enter="animate = true"
                x-intersect:leave="animate = false" x-intersect:options="{ threshold: 0.5 }"
                :class="animate
                    ?
                    'opacity-100 translate-y-0 transition duration-700' :
                    'opacity-0 translate-y-10'">
                <a class="relative inline-flex items-center justify-center gap-2 rounded-sm bg-neutral-800 px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600
   before:absolute before:-z-10 before:top-1 before:left-1 before:w-full before:h-full before:rounded-sm before:bg-[#ffab00]
    before:opacity-0 before:transition-opacity before:duration-300 hover:before:opacity-100"
                    href="#">
                    <span class="relative z-10">REQUEST A FREE QUOTE</span>
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
    </div>
</section>
