@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 py-2 px-2 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
