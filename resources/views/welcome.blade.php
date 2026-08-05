<x-layouts.base
    title="Solar Energy Solutions for Jamaica | Solara"
    description="Solara makes dependable solar power, battery backup, and energy management easier for Jamaican homes and businesses."
    keywords="solar energy Jamaica, solar panels, battery backup, renewable energy, Solara"
    canonical-url="{{ url()->current() }}"
>
    <x-partials.hero />
    <x-partials.why :products="$featuredProducts" />
    <x-partials.listings />
    <x-partials.testimonials />
</x-layouts.base>
