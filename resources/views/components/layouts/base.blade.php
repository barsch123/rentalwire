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
window.addEventListener('livewire:navigated', () => setTimeout(() => loading = false, 1500));
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
    <div x-data="{ isVisible: false }"
        x-init="window.addEventListener('scroll', () => isVisible = window.scrollY > 1000)" x-show="isVisible"
        x-transition class="fixed bottom-6 right-6 rounded-full">
        <button class="cursor-pointer" aria-label="Scroll to top"
            x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })">

            <svg class="text-4xl text-[#ffab00]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
            </svg>

        </button>
    </div>

    @livewireScripts
    @stack('scripts')
</body>

</html>