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
                    <p class="mb-4 text-xs uppercase tracking-widest text-[#9a6700]">
                        About Us
                    </p>

                    <h2 class="text-3xl md:text-4xl font-extrabold text-neutral-900 mb-6 leading-tight">
                        Solar energy systems<br class="hidden sm:block">
                        built for real conditions
                    </h2>

                    <p class="text-neutral-700 leading-relaxed mb-6">
                        Solara provides dependable solar design, installation, storage, and maintenance services
                        for Jamaica's homes, businesses, and industrial sites.
                    </p>

                    <p class="text-neutral-700 leading-relaxed">
                        We focus on practical system design, reliable components, and responsive aftercare so every
                        customer can lower energy costs with confidence.
                    </p>
                </div>

                <!-- RIGHT: Highlight panel -->
                <div class="bg-neutral-50 border border-neutral-200 rounded-2xl p-8 space-y-6">
                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            What we deliver
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Rooftop and ground-mount solar, hybrid inverters, battery storage, and monitoring.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            Why it matters
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Lower utility bills, cleaner backup power, and better control over energy costs.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-neutral-900 mb-1">
                            How we work
                        </h4>
                        <p class="text-sm text-neutral-600">
                            Clear proposals, code-compliant installs, and local service after commissioning.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-neutral-200 flex gap-3">
                        <a href="{{ route('services') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 px-4! py-2!">
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
