<section id="hero" class="relative isolate min-h-screen overflow-hidden bg-neutral-950 pb-16 pt-24 text-white md:pb-24"
    aria-label="Solara solar energy solutions" x-data="homeHero" @mouseenter="pause" @mouseleave="start">
    <template x-for="(slide, index) in slides" :key="slide.label">
        <img x-show="active === index" x-transition:enter="transition-opacity duration-1000 ease-out"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-1000 ease-out" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" :src="slide.image" :alt="slide.alt"
            :fetchpriority="index === 0 ? 'high' : 'auto'" decoding="async"
            class="absolute inset-0 -z-30 h-full w-full object-cover">
    </template>

    <div class="absolute inset-0 -z-20 bg-linear-to-r from-black/95 via-black/65 to-black/20"></div>
    <div class="absolute inset-0 -z-10 bg-linear-to-t from-black/70 via-transparent to-black/20"></div>

    <div class="mx-auto flex min-h-[calc(100vh-6rem)] max-w-[90rem] flex-col justify-between px-6 py-14 sm:px-10 lg:px-16 lg:py-20">
        <div class="my-auto max-w-3xl py-10">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-general">Solara energy solutions</p>
            <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl"
                x-text="slides[active].title">
                Power your home with more predictable energy.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-7 text-neutral-200 sm:text-lg"
                x-text="slides[active].description">
                A solar system designed around your roof, daily usage, and long-term savings goals.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('contact') }}" wire:navigate
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 px-6">
                    Request a quote
                </a>
                <a href="{{ route('rentals') }}" wire:navigate
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/30 bg-black/15 px-6 py-3 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:bg-white/10">
                    <span>VIEW OUR</span>
                    <span>SOLUTIONS</span>
                    <flux:icon.arrow-right class="size-4" />
                </a>
            </div>
        </div>

        <div class="grid max-w-3xl grid-cols-3 gap-3" role="tablist" aria-label="Featured solar solutions">
            <button type="button" role="tab" @click="select(0)" :aria-selected="active === 0"
                class="border-t-2 px-1 pt-3 text-left text-xs font-medium transition-colors duration-300 ease-out sm:text-sm"
                :class="active === 0 ? 'border-general text-white' : 'border-white/30 text-white/60 hover:border-white/60 hover:text-white'">
                <span class="block">Home solar</span>
                <span class="mt-1 hidden text-xs font-normal text-white/50 sm:block">Lower monthly costs</span>
            </button>
            <button type="button" role="tab" @click="select(1)" :aria-selected="active === 1"
                class="border-t-2 px-1 pt-3 text-left text-xs font-medium transition-colors duration-300 ease-out sm:text-sm"
                :class="active === 1 ? 'border-general text-white' : 'border-white/30 text-white/60 hover:border-white/60 hover:text-white'">
                <span class="block">Battery backup</span>
                <span class="mt-1 hidden text-xs font-normal text-white/50 sm:block">Power through outages</span>
            </button>
            <button type="button" role="tab" @click="select(2)" :aria-selected="active === 2"
                class="border-t-2 px-1 pt-3 text-left text-xs font-medium transition-colors duration-300 ease-out sm:text-sm"
                :class="active === 2 ? 'border-general text-white' : 'border-white/30 text-white/60 hover:border-white/60 hover:text-white'">
                <span class="block">Commercial</span>
                <span class="mt-1 hidden text-xs font-normal text-white/50 sm:block">Plan at business scale</span>
            </button>
        </div>
    </div>
</section>
