@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-200 bg-white text-neutral-500 focus:border-[#ffab00] focus:ring-[#ffab00] rounded-md shadow-sm',
]) !!}>
