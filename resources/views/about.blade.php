<x-layouts.base>
    <section class="relative py-24 px-6 md:px-0 overflow-hidden bg-white">
        <!-- subtle diagonal stripes -->
        <div
            class="absolute inset-0 pointer-events-none
           opacity-[0.02]
           bg-[linear-gradient(135deg,#000_25%,transparent_25%,transparent_50%,#000_50%,#000_75%,transparent_75%,transparent)]
           bg-size-[64px_64px]">
        </div>


        <div class="relative py-10 z-10 max-w-7xl mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- LEFT: Story -->
                <div class="max-w-xl">
                    <p class="text-xs uppercase tracking-widest text-yellow-600 mb-4">
                        About Us
                    </p>

                    <h2 class="text-3xl md:text-4xl font-extrabold text-neutral-900 mb-6 leading-tight">
                        Security and tracking<br class="hidden sm:block">
                        built for real conditions
                    </h2>

                    <p class="text-neutral-700 leading-relaxed mb-6">
                        Patri Protect provides dependable vehicle tracking and security services
                        designed for Jamaica's roads and real-world risks.
                    </p>

                    <p class="text-neutral-700 leading-relaxed">
                        We focus on visibility, reliability, and fast response —
                        giving drivers and businesses confidence every day.
                    </p>
                </div>

                <!-- RIGHT: Highlight panel -->
                <div class="bg-neutral-50 border border-neutral-200 rounded-2xl p-8 space-y-6">
                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            What we deliver
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Real-time GPS tracking, alerts, and recovery support.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            Why it matters
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Faster response times, reduced risk, and peace of mind.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            How we work
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Clear communication, reliable systems, and local expertise.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-neutral-200 flex gap-3">
                        <a href="{{ route('services') }}"
                            class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-semibold rounded-lg">
                            Our services
                        </a>

                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-4 py-2 border border-neutral-300 text-neutral-800 text-sm font-semibold rounded-lg">
                            Contact us
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layouts.base>
