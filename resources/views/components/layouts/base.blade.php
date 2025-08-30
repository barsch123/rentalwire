<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="">

    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og:title', config('app.name'))">
    <meta property="og:description" content="@yield('og:description', 'Default description here')">
    <meta property="og:type" content="@yield('og:type', 'website')">
    <meta property="og:url" content="@yield('og:url', request()->fullUrl())">
    <meta property="og:image" content="@yield('og:image', asset('default-og-image.jpg'))">
    <meta property="og:site_name" content="@yield('og:site_name', config('app.name'))">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/campfire.css') }}">


    @stack('styles')
    <!-- Canonical Link -->
    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @else
        <link rel="canonical" href="{{ request()->fullUrl() }}">
    @endif

    {{-- Prevent FOUC --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-body antialiased overflow-x-hidden!" x-data="{ loading: true }" x-init="window.addEventListener('load', () => setTimeout(() => loading = false, 500));
window.addEventListener('livewire:navigating', () => loading = true);
window.addEventListener('livewire:navigated', () => setTimeout(() => loading = false, 500));
window.addEventListener('livewire:load', () => loading = false);">
    {{-- Preloader --}}
    <div x-cloak x-show="loading" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div class="loader"></div>
    </div>

    {{-- Main Content --}}
    <div x-cloak x-show="!loading" x-transition.opacity>
        @livewire('components.header')
        {{ $slot }}
        @livewire('components.footer')
    </div>

    {{-- Scroll-to-top --}}
    <div x-data="{ show: false }" x-on:scroll.window="show = window.pageYOffset >= 1000" class="fixed bottom-8 right-8">

        <button x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="shadow-lg bg-[#d45112] p-2 rounded-full">

            <svg class="text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m11 7.825l-4.9 4.9q-.3.3-.7.288t-.7-.313q-.275-.3-.288-.7t.288-.7l6.6-6.6q.15-.15.325-.212T12 4.425q.2 0 .375.063t.325.212l6.6 6.6q.275.275.275.688t-.275.712q-.3.3-.713.3t-.712-.3L13 7.825V19q0 .425-.288.713T12 20q-.425 0-.713-.288T11 19V7.825Z" />
            </svg>

        </button>
    </div>


    @livewireScripts
    @stack('scripts')
</body>

</html>