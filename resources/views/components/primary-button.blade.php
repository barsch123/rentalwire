<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md border border-transparent bg-general px-4 py-2 text-xs font-semibold uppercase tracking-widest text-neutral-950 transition ease-in-out duration-150 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-general focus:ring-offset-2 active:bg-yellow-600']) }}>
    {{ $slot }}
</button>
