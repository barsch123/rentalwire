@php
    $testimonial = [
        'quote' => 'Solara made our solar upgrade clear from the first site visit. The team explained the savings, installed on schedule, and left us with a system that has already lowered our monthly energy costs.',
        'name' => 'John Doe',
        'role' => 'Homeowner, Kingston',
        'avatar' => asset('img/user-1.jpg'),
        'image' => asset('img/testimonial.png'),
    ];
@endphp

<section class="bg-white px-6 py-24 md:px-12 md:py-28 lg:px-24 lg:py-32">
    <div class="mx-auto max-w-7xl">
        <div class="relative mb-10 text-center">
            <h2 x-data="{ animate: false }" x-intersect.once="animate = true"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-40 translate-y-0 transition duration-900 ease-out' : 'opacity-0 -translate-y-6'"
                class="section-title pointer-events-none absolute inset-x-0 top-1/2 hidden -translate-y-1/2 text-5xl font-extrabold uppercase leading-none tracking-wide text-gray-200 md:block md:text-7xl">
                WHAT OUR CUSTOMERS SAY
            </h2>

            <h2 x-data="{ animate: false }" x-intersect.once="animate = true"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-100 translate-y-0 transition duration-900 ease-out' : 'opacity-0 -translate-y-8'"
                class="relative text-4xl font-extrabold text-gray-900 md:text-5xl">
                CUSTOMER <span class="block text-[#9a6700]">TESTIMONIAL</span>
            </h2>
        </div>

        <div class="relative" x-data="{ visible: false }" x-intersect.once="visible = true"
            x-intersect:options="{ threshold: 0.35 }"
            :class="visible ? 'opacity-100 translate-y-0 scale-100 transition duration-900 ease-out' : 'opacity-0 translate-y-10 scale-95'">
            <div class="absolute -left-6 top-8 hidden h-40 w-40 bg-neutral-800 lg:block"></div>
            <div class="absolute -right-6 bottom-8 hidden h-40 w-40 bg-general lg:block"></div>

            <div
                class="relative grid overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-gray-200 lg:grid-cols-[0.95fr_1.05fr]">
                <figure class="flex flex-col justify-center p-6 sm:p-8 lg:p-10">
                    <div class="mb-6 flex gap-1 text-[#9a6700]" aria-label="5 out of 5 stars">
                        @for ($star = 0; $star < 5; $star++)
                            <i class="fas fa-star text-sm"></i>
                        @endfor
                    </div>

                    <blockquote class="text-lg font-medium leading-8 text-gray-800 sm:text-xl">
                        &ldquo;{{ $testimonial['quote'] }}&rdquo;
                    </blockquote>

                    <figcaption class="mt-8 flex items-center gap-4">
                        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}"
                            class="h-14 w-14 rounded-full border-2 border-general object-cover">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $testimonial['name'] }}</p>
                            <p class="text-sm text-gray-600">{{ $testimonial['role'] }}</p>
                        </div>
                    </figcaption>
                </figure>

                <div class="min-h-72 lg:min-h-105">
                    <img src="{{ $testimonial['image'] }}" alt="Installed solar panels on a home"
                        class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
