<x-layouts.base title="Home" description=""
    keywords="" canonical-url="{{ url()->current() }}">
    <div class="overflow-x-hidden">
        <x-partials.hero />
        <x-partials.why />
        <x-partials.listings />
        <x-partials.testimonials />
        <x-partials.cta />
    </div>
</x-layouts.base>
