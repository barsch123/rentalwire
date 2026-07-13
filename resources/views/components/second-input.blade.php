@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'block w-full rounded-lg border border-neutral-300 dark:border-neutral-900 bg-white px-3 py-2.5 text-sm text-neutral-950 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-general focus:ring-2 focus:ring-general/20 disabled:cursor-not-allowed disabled:bg-neutral-100 disabled:text-neutral-500',
]) !!}>
