<x-layouts.base
    title="Contact Solara"
    description="Contact Solara to discuss solar panels, battery backup, energy solutions, and a tailored estimate for your home or business."
    keywords="contact Solara, solar estimate Jamaica, solar consultation, battery backup"
>
    <section class="bg-neutral-50 px-6 py-20 md:px-12 md:py-24 lg:px-24">
        <div class="mx-auto max-w-6xl">
            <div class="mx-auto max-w-3xl text-center">
                <h1 class="text-4xl font-extrabold leading-tight text-neutral-900 md:text-5xl">
                    Have Questions? Get in Touch!
                </h1>
                <p class="mt-4 text-base leading-7 text-neutral-600">
                    Our team is ready to help. Connect with us to learn more about our services and solutions.
                </p>
            </div>

            <div class="mt-14 grid gap-5 md:grid-cols-3">
                <a href="tel:18760000000"
                    class="flex items-center gap-4 rounded-lg bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="flex size-10 items-center justify-center rounded-lg bg-general/15 text-[#9a6700]">
                        <i class="fas fa-phone-volume text-base"></i>
                    </span>
                    <span>
                        <span class="block font-bold text-neutral-900">Call us today</span>
                        <span class="mt-1 block text-sm text-neutral-600">1-876-000-0000</span>
                    </span>
                </a>

                <a href="mailto:info@solara.example"
                    class="flex items-center gap-4 rounded-lg bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="flex size-10 items-center justify-center rounded-lg bg-general/15 text-[#9a6700]">
                        <i class="fas fa-envelope text-base"></i>
                    </span>
                    <span>
                        <span class="block font-bold text-neutral-900">Send an Email</span>
                        <span class="mt-1 block text-sm text-neutral-600">info@solara.example</span>
                    </span>
                </a>

                <div class="flex items-center gap-4 rounded-lg bg-white p-5 shadow-sm">
                    <span class="flex size-10 items-center justify-center rounded-lg bg-general/15 text-[#9a6700]">
                        <i class="fas fa-location-dot text-base"></i>
                    </span>
                    <span>
                        <span class="block font-bold text-neutral-900">Visit Our HQ</span>
                        <span class="mt-1 block text-sm text-neutral-600">123 Energy Way, Kingston</span>
                    </span>
                </div>
            </div>

            <div class="relative mt-10 lg:mt-12">
                <div class="overflow-hidden rounded-xl bg-neutral-200 shadow-sm lg:w-[73%]">
                    <img src="{{ asset('img/contact-consultation.png') }}" alt="Solara consultant outside a home with rooftop solar panels"
                        class="h-80 w-full object-cover md:h-[36rem]">
                </div>

                <div
                    class="mt-6 rounded-lg bg-white p-6 shadow-xl lg:absolute lg:right-0 lg:top-1/2 lg:mt-0 lg:w-[43%] lg:-translate-y-1/2 lg:p-8">
                    <div class="mb-7 text-center">
                        <h2 class="text-2xl font-bold text-neutral-900">Send us a message</h2>
                    </div>

                    <livewire:contact-form />

                    @if (session()->has('error'))
                        <div class="mt-6 rounded-lg bg-red-500 p-4 text-sm text-white" role="alert">
                            <span class="font-bold">Error:</span> {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>
