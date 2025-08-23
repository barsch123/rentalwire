<section class="py-16 px-6">
    <div class="container mx-auto px-4 relative py-10 mb-10 text-center" x-data>
        <!-- Background Title -->
        <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
            x-intersect:options="{ threshold: 0.5 }"
            :class="animate
                ?
                'opacity-50 -translate-x-0 transition duration-700' :
                'opacity-0 -translate-x-10'"
            class="section-title absolute inset-0 text-5xl md:text-7xl font-extrabold text-gray-200 opacity-50 uppercase tracking-wide leading-none md:block hidden">
            WHAT OUR CUSTOMERS SAY
        </h2>

        <!-- Foreground Title -->
        <h2 class="relative text-3xl md:text-5xl font-extrabold text-neutral-600" x-data="{ animate: false }"
            x-intersect:enter="animate = true" x-intersect:leave="animate = false"
            x-intersect:options="{ threshold: 0.5 }"
            :class="animate
                ?
                'opacity-100 translate-y-0 transition duration-700' :
                'opacity-0 -translate-y-10'">
            TESTIMONIAL
        </h2>
    </div>

    <div class="flex flex-col md:flex-row justify-center items-center relative" x-data="{ visible: false }"
        x-intersect:enter="visible = true" x-intersect:leave="visible = false" x-intersect:options="{ threshold: 0.5 }"
        :class="visible
            ?
            'opacity-100  transition duration-700' :
            'opacity-0 '">
        <!-- Testimonial Content -->
        <div
            class="w-full md:w-[550px] bg-white rounded-xl shadow-lg md:rounded-tl-xl md:rounded-bl-xl md:before:absolute md:before:hidden lg:block md:before:bg-neutral-800 md:before:w-1/3 md:before:content-[''] md:before:h-full md:before:-z-20 md:before:-right-20 md:before:-top-10 p-6 md:p-8">
            <div class="flex flex-col justify-center items-center h-full">
                <p class="text-lg text-gray-800 italic mb-4 text-center">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
                </p>
                <div class="flex items-center">
                    <img src="{{ asset('img/user-1.jpg') }}" alt="Customer Avatar"
                        class="w-12 h-12 rounded-full border-2 border-gray-300 mr-4">
                    <div>
                        <p class="font-semibold text-gray-900">John Doe</p>
                        <p class="text-sm text-gray-600">CEO, CompanyName</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div
            class="w-full md:w-[650px] lg:block hidden rounded-tr-lg shadow-lg relative md:before:absolute md:before:bg-yellow-500 md:before:w-1/3 md:before:content-[''] md:before:h-full md:before:-z-20 md:before:-right-20 md:before:top-20">
            <img src="{{ asset('img/testimonial.png') }}" class="h-full w-full object-cover rounded-lg md:rounded-none"
                alt="">
        </div>
    </div>
</section>
