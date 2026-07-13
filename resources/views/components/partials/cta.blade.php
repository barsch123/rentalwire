<section class="bg-white px-6 py-20 text-neutral-950 md:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl">
    <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2" x-data="{ visible: false }"
        x-intersect.once="visible = true" x-intersect:options="{ threshold: 0.25 }"
        :class="visible ? 'opacity-100 translate-y-0 transition duration-900 ease-out' : 'opacity-0 translate-y-10'">
        <!-- Text column -->
        <div class="text-center lg:text-left">
            <h2 class="text-3xl font-extrabold leading-tight text-neutral-950 sm:text-4xl md:text-5xl">
                Start your solar upgrade
            </h2>

            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-neutral-600 sm:text-lg lg:mx-0">
                Share your energy goals and we will prepare a practical solar plan with system sizing, battery options,
                pricing, and installation timelines.
            </p>

            <!-- CTA group (uses Alpine intersection for reveal) -->
            <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4 justify-center lg:justify-start"
                x-data="{ animate: false }" x-intersect.once="animate = true"
                :class="animate ? 'opacity-100 translate-y-0 transition duration-900 ease-out' : 'opacity-0 translate-y-6'">

                <!-- Primary CTA -->
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 group"
                    aria-label="Request a free quote">
                    <span>REQUEST A FREE QUOTE</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:translate-x-0.5" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- Secondary CTA -->
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-neutral-300 bg-white px-5 py-3 text-sm font-semibold text-neutral-800 transition-all duration-300 ease-out hover:-translate-y-0.5 hover:border-neutral-950 hover:text-neutral-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-general/40"
                    aria-label="Contact us">
                    Talk to an expert
                </a>
            </div>

            <!-- microcopy -->
            <p class="mx-auto mt-3 max-w-xs text-sm text-neutral-500 lg:mx-0">
                No obligations · Free quote · Typical response within 24 hours
            </p>
        </div>

        <!-- Decorative / visual column -->
        <div class="flex justify-center lg:justify-end">
            <div
                class="aspect-[16/10] w-full max-w-md rounded-xl border border-neutral-200 bg-gradient-to-br from-white via-general/10 to-neutral-100 p-6 shadow-sm transition-all duration-500 ease-out hover:-translate-y-1 hover:shadow-lg">
                <!-- optional placeholder illustration or screenshot -->
                <div
                    class="flex h-full w-full items-center justify-center rounded-lg border border-dashed border-general/50 bg-white/65 text-sm font-medium text-neutral-500">
                    Solar assessment preview
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
