<x-layouts.base title="About Solara" description="Learn how Solara designs dependable solar energy systems for homes and businesses across Jamaica." keywords="Solara, solar company Jamaica, solar energy, battery storage">
    <main class="bg-neutral-50 text-neutral-950 dark:bg-neutral-950 dark:text-white">
        <section class="relative isolate overflow-hidden bg-neutral-900 text-white">
            <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_80%_15%,rgba(255,171,0,0.24),transparent_32%),radial-gradient(circle_at_10%_90%,rgba(255,255,255,0.08),transparent_36%)]"></div>
            <div class="absolute right-0 top-0 -z-10 h-full w-1/2 bg-[linear-gradient(125deg,transparent_20%,rgba(255,255,255,0.04)_20%,rgba(255,255,255,0.04)_21%,transparent_21%,transparent_38%,rgba(255,255,255,0.04)_38%,rgba(255,255,255,0.04)_39%,transparent_39%)]"></div>

            <div class="mx-auto grid max-w-7xl gap-14 px-6 pb-20 pt-16 sm:px-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-16 lg:pb-28 lg:pt-24">
                <div>
                    <h1 class="mt-6 max-w-3xl text-5xl font-bold leading-[1.02] tracking-tight sm:text-6xl lg:text-7xl">
                        Energy independence, designed for real life.
                    </h1>
                    <p class="mt-7 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">
                        We make solar easier to understand, easier to own, and better suited to the way Jamaican homes and businesses actually use energy.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('contact') }}" wire:navigate class="inline-flex items-center justify-center gap-3 rounded-lg bg-general px-6 py-3.5 text-sm font-bold text-neutral-950 transition hover:-translate-y-0.5 hover:brightness-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-general/40">
                            Start a conversation
                            <flux:icon.arrow-up-right class="size-4" />
                        </a>
                        <a href="{{ route('solutions') }}" wire:navigate class="inline-flex items-center justify-center gap-3 rounded-lg border border-white/20 px-6 py-3.5 text-sm font-semibold text-white transition hover:border-white/50 hover:bg-white/10">
                            Explore solutions
                            <flux:icon.arrow-right class="size-4" />
                        </a>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-lg lg:ml-auto">
                    <div class="absolute -bottom-5 -left-5 h-32 w-32 rounded-full border border-general/50"></div>
                    <div class="relative overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-3 shadow-2xl shadow-black/30 backdrop-blur-sm">
                        <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1200&q=85" alt="Solar panels installed on a rooftop under a bright sky" class="aspect-[4/5] w-full rounded-[1.5rem] object-cover">
                        <div class="absolute bottom-8 left-8 right-8 rounded-xl border border-white/20 bg-neutral-900/85 p-4 backdrop-blur-md">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-general">Our point of view</p>
                            <p class="mt-2 text-sm leading-6 text-white">The best system is the one that keeps working when you need it most.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-b border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">
            <div class="mx-auto grid max-w-7xl divide-y divide-neutral-200 px-6 py-8 sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:px-10 lg:px-16 dark:divide-neutral-800">
                <div class="py-4 sm:px-8 sm:py-2 sm:first:pl-0">
                    <p class="text-3xl font-bold text-[#9a6700]">01</p>
                    <p class="mt-2 text-sm font-semibold text-neutral-900 dark:text-white">Clear recommendations</p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600 dark:text-neutral-400">A system shaped around your usage, roof, and goals.</p>
                </div>
                <div class="py-4 sm:px-8 sm:py-2">
                    <p class="text-3xl font-bold text-[#9a6700]">02</p>
                    <p class="mt-2 text-sm font-semibold text-neutral-900 dark:text-white">Reliable components</p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600 dark:text-neutral-400">Thoughtful equipment choices with room to grow.</p>
                </div>
                <div class="py-4 sm:px-8 sm:py-2 sm:last:pr-0">
                    <p class="text-3xl font-bold text-[#9a6700]">03</p>
                    <p class="mt-2 text-sm font-semibold text-neutral-900 dark:text-white">Support after install</p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600 dark:text-neutral-400">Local guidance from first proposal to long-term care.</p>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl gap-12 px-6 py-20 sm:px-10 md:py-28 lg:grid-cols-[0.8fr_1.2fr] lg:px-16">
            <div>
                <h2 class="mt-4 text-4xl font-bold leading-tight tracking-tight sm:text-5xl">A better way to take control of energy.</h2>
            </div>
            <div class="grid gap-8 text-base leading-8 text-neutral-600 dark:text-neutral-300 sm:grid-cols-2">
                <p>Energy should make life more predictable, not more stressful. Solara was built to help people move from rising utility costs and uncertain backup power to a plan they can understand and trust.</p>
                <p>From a compact home system to a larger commercial installation, we bring the same care to every project: listen closely, design responsibly, install properly, and stay available.</p>
            </div>
        </section>

        <section class="bg-neutral-900 px-6 py-20 text-white sm:px-10 md:py-28 lg:px-16">
            <div class="mx-auto max-w-7xl">
                <div class="max-w-2xl">
                    <h2 class="mt-4 text-4xl font-bold tracking-tight sm:text-5xl">From first question to dependable power.</h2>
                </div>
                <div class="mt-14 grid gap-8 md:grid-cols-4">
                    @foreach ([['01', 'Understand', 'We learn how you use energy, what matters most, and where the gaps are.'], ['02', 'Design', 'We shape the right mix of solar, storage, controls, and monitoring for your site.'], ['03', 'Install', 'Our team turns the plan into a clean, carefully commissioned system.'], ['04', 'Support', 'We help you get the most from your investment long after switch-on day.']] as [$number, $title, $description])
                        <div class="border-t border-white/20 pt-5">
                            <p class="text-sm font-bold text-general">{{ $number }}</p>
                            <h3 class="mt-8 text-xl font-bold">{{ $title }}</h3>
                            <p class="mt-3 text-sm leading-7 text-neutral-300">{{ $description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="px-6 py-20 sm:px-10 md:py-28 lg:px-16">
            <div class="mx-auto grid max-w-7xl items-center gap-10 rounded-[2rem] bg-general px-7 py-10 sm:px-12 md:grid-cols-[1fr_auto] md:py-14">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-neutral-800/70">Let’s plan what’s next</p>
                    <h2 class="mt-3 max-w-2xl text-3xl font-bold leading-tight text-neutral-950 sm:text-4xl">Your energy future should start with a useful conversation.</h2>
                </div>
                <a href="{{ route('contact') }}" wire:navigate class="inline-flex items-center justify-center gap-3 rounded-lg bg-neutral-950 px-6 py-3.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-neutral-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-neutral-950/30">
                    Talk to Solara
                    <flux:icon.arrow-up-right class="size-4" />
                </a>
            </div>
        </section>
    </main>
</x-layouts.base>
