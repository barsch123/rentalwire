<div x-data="{ mobileMenuIsOpen: false, userDropDownIsOpen: false }"
    x-on:keydown.escape.window="mobileMenuIsOpen = false; userDropDownIsOpen = false">
    <header
        class="font-bungee fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-neutral-900 to-neutral-800 w-full py-3 shadow-lg transition-colors duration-300">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Brand Logo -->
                <div class="flex-shrink-0">
                    <a href="/"
                        class="flex items-center text-2xl font-bold text-white hover:text-[#ffab00] transition-colors duration-200">
                        <span>Peng<span class="text-[#ffab00]">ui</span>n</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden sm:flex sm:items-center sm:space-x-6">
                    <a href="{{ route('equipment-rentals') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'equipment-rentals'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('equipment-rentals'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('equipment-rentals')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        Rentals
                    </a>

                    <a href="{{ route('blog.index') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'blog.index'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('blog.index'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('blog.index')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        Blog
                    </a>

                    <a href="{{ route('about') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'about'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('about'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('about')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        About
                    </a>

                    <a href="{{ route('careers') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'careers'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('careers'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('careers')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        Careers
                    </a>

                    <a href="{{ route('contact') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'contact'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('contact'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('contact')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        Contact
                    </a>

                    <a href="{{ route('login') }}" wire:navigate @class([
                        'px-1 py-2 text-sm font-medium transition-colors duration-200 relative',
                        'text-white hover:text-[#ffab00] dark:hover:text-[#ffab00]' => !request()->routeIs(
                            'login'
                        ),
                        'text-[#ffab00] font-bold' => request()->routeIs('login'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-[#ffab00] after:transition-all after:duration-300',
                        request()->routeIs('login')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                    ])>
                        Login
                    </a>

                    <!-- User Dropdown -->
                    <div class="ml-4 relative">
                        <button x-on:click="userDropDownIsOpen = !userDropDownIsOpen"
                            x-bind:aria-expanded="userDropDownIsOpen"
                            class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ffab00]">
                            <img class="h-8 w-8 rounded-full border-2 border-transparent hover:border-[#ffab00] transition-colors duration-200"
                                src="{{asset('img/user-1.jpg')}}"
                                alt="User Profile">
                        </button>

                        <div x-cloak x-show="userDropDownIsOpen" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            x-on:click.outside="userDropDownIsOpen = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-800 ring-black ring-opacity-5 focus:outline-none">
                            <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{Auth::check() ? Auth::user()->name : ''}}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{Auth::check() ? Auth::user()->email : ''}}
                                </p>
                            </div>
                            <a href="{{ Auth::user()?->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}" wire:navigate
                                class="block px-4 py-2 text-sm text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:hover:bg-gray-700 dark:text-white">
                                Dashboard
                            </a>


                            </a>
                            @if(Auth::check())
                                <div class="border-t border-gray-200 dark:border-gray-700 mt-1">
                                    <a href="#" wire:click.prevent="logout"
                                        class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:text-red-500 dark:hover:bg-gray-700">
                                        Sign Out
                                    </a>
                                </div>
                            @endif


                        </div>
                    </div>
                </nav>

                <div class="sm:hidden flex items-center">
                    <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen"
                        class="inline-flex items-center flex-col space-y-2 justify-center p-2 rounded-md">
                        <span class="sr-only">Open main menu</span>
                        <div class="h-[2px] w-7 bg-white transition-all duration-300 ease-in-out" :class="{
                                'rotate-45 translate-y-[7px]': mobileMenuIsOpen,
                                '': !mobileMenuIsOpen
                            }">
                        </div>
                        <div class="h-[2px] w-7 bg-white transition-all duration-300 ease-in-out" :class="{
                                'opacity-0': mobileMenuIsOpen,
                                'opacity-100': !mobileMenuIsOpen
                            }">
                        </div>
                        <div class="h-[2px] w-7 bg-white transition-all duration-300 ease-in-out" :class="{
                                '-rotate-45 translate-y-[-7px]': mobileMenuIsOpen,
                                '': !mobileMenuIsOpen
                            }">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- If you want to use the mobile menu overlay, uncomment the following section. --}}


    <!-- Mobile menu overlay -->
    <div x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-60 bg-neutral-900/50 backdrop-blur-sm"
        x-on:click="mobileMenuIsOpen = false">
    </div>

    <!-- Mobile menu sidebar -->
    <div x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="font-bungee fixed inset-y-0 left-0 z-70 w-64 border-r max-w-sm bg-white shadow-xl overflow-y-auto"
        @click.away="mobileMenuIsOpen = false">

        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <a href="/" class="text-xl font-bold text-gray-900 dark:text-white">
                <span>Peng<span class="text-[#ffab00]">ui</span>n</span>
            </a>
            <button x-on:click="mobileMenuIsOpen = false"
                class="p-2 rounded-md text-white hover:text-[#ffab00] hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="px-4 py-6">
            <!-- User Profile -->
            <div class="flex items-center space-x-3 mb-6 px-2">
                <img class="h-10 w-10 rounded-full border-2 border-[#ffab00]"
                    src="{{asset('img/user-1.jpg')}}" alt="User Profile">
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                        {{Auth::check() ? Auth::user()->name : ''}}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{Auth::check() ? Auth::user()->email : ''}}</p>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <nav class="space-y-1">
                <a href="{{ route('equipment-rentals') }}" wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    Rentals
                </a>
                <a href="{{ route('blog.index') }}" wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    Blog
                </a>
                <a href="{{ route('about') }}" wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    About
                </a>
                <a href="{{ route('careers') }}" wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    Careers
                </a>
                <a href="{{ route('contact') }}" wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    Contact
                </a>
            </nav>

            <!-- Mobile User Menu -->
            <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ Auth::user()?->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                    wire:navigate
                    class="block px-3 py-2 rounded-md text-base font-medium text-neutral-900 hover:bg-gray-100 hover:text-[#ffab00] dark:text-white dark:hover:bg-gray-700">
                    Dashboard
                </a>


                @if(Auth::check())
                    <flux:button wire:click="" class="bg-[#ffab00]! text-white! hover:bg-[#ffab00]/90!">Sign Out
                    </flux:button>
                @endif



            </div>
        </div>
    </div>
</div>