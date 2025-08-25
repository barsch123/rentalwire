<section class="h-screen mx-auto max-w-7xl px-6 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text column -->
        <div class="text-center lg:text-left">
            <h2
                class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-transparent bg-clip-text">
                Get started with your next project
            </h2>

            <p class="mt-4 text-base sm:text-lg text-zinc-600 dark:text-zinc-300 max-w-xl mx-auto lg:mx-0">
                We convert ideas into working products — fast. Tell us what you need and we’ll build a plan, a quote,
                and
                timelines so you can start immediately.
            </p>

            <!-- CTA group (uses Alpine intersection for reveal) -->
            <div class="mt-8 flex flex-col sm:flex-row sm:items-center sm:gap-4 gap-3 justify-center lg:justify-start"
                x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                :class="animate ? 'opacity-100 translate-y-0 transition duration-700 ease-out' : 'opacity-0 translate-y-6'">

                <!-- Primary CTA -->
                <a href="#request-quote"
                    class="relative inline-flex items-center gap-3 rounded-lg px-5 py-3 font-semibold text-white focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-300 focus-visible:ring-offset-2"
                    style="background: linear-gradient(90deg,#2b2b2b 0%, #1f1f1f 100%);"
                    aria-label="Request a free quote">
                    <!-- animated highlight behind -->
                    <span aria-hidden
                        class="absolute -inset-0.5 -z-10 rounded-lg transition-transform duration-300 transform scale-95 opacity-0 group-hover:scale-100 group-hover:opacity-100"
                        style="background: linear-gradient(90deg,#ffb703,#ffab00); filter: blur(6px);"></span>

                    <span class="relative z-10">REQUEST A FREE QUOTE</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 h-4 w-4" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- Secondary CTA -->
                <a href="#contact"
                    class="inline-flex items-center gap-2 rounded-lg px-5 py-3 border border-zinc-200 dark:border-zinc-700 text-sm font-medium hover:bg-zinc-50 dark:hover:bg-zinc-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-300"
                    aria-label="Contact us">
                    Talk to an expert
                </a>
            </div>

            <!-- microcopy -->
            <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400 max-w-xs mx-auto lg:mx-0">
                No obligations · Free quote · Typical response within 24 hours
            </p>
        </div>

        <!-- Decorative / visual column -->
        <div class="flex justify-center lg:justify-end">
            <div
                class="w-full max-w-md aspect-[16/10] rounded-2xl bg-gradient-to-br from-zinc-50 to-zinc-100 dark:from-zinc-800 dark:to-zinc-900 shadow-md p-6">
                <!-- optional placeholder illustration or screenshot -->
                <div
                    class="h-full w-full rounded-xl border border-dashed border-zinc-200 dark:border-zinc-700 flex items-center justify-center text-zinc-400">
                    Illustration / Screenshot
                </div>
            </div>
        </div>
    </div>
</section>