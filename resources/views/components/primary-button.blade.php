<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-700 hover:bg-white focus:bg-white active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-[#ffab00] focus:ring-offset-2 focus:ring-offset-[#ffab00] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
