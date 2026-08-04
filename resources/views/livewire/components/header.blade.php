<div x-data="{ mobileMenuIsOpen: false, userDropDownIsOpen: false }"
    x-on:keydown.escape.window="mobileMenuIsOpen = false; userDropDownIsOpen = false">
    <header
        class="fixed top-0 left-0 right-0 z-50 bg-linear-to-r from-neutral-900 to-neutral-800 w-full py-3 shadow-lg transition-colors duration-300">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Brand Logo -->
                <div class="shrink-0">
                    <a href="/" wire:navigate
                        class="flex items-center text-2xl font-bold text-white hover:text-general transition-colors duration-200">
                        <img class="md:size-50 size-35 " src="{{ asset('img/logo-dark.svg') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden sm:flex sm:items-center sm:space-x-6">
                    <a href="{{ route('solutions') }}" wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'solutions'
                        ),
                        'text-general font-bold' => request()->routeIs('solutions'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('solutions')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        Solutions
                    </a>

                    <a href="{{ route('blog.index') }}" wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'blog.index'
                        ),
                        'text-general font-bold' => request()->routeIs('blog.index'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('blog.index')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        Blog
                    </a>

                    <a href="{{ route('about') }}" wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'about'
                        ),
                        'text-general font-bold' => request()->routeIs('about'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('about')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        About
                    </a>

                    {{-- <a href="{{ route('careers') }}" wire:navigate
                    @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative'
                    , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                    'careers'
                    ),
                    'text-general font-bold' => request()->routeIs('careers'),
                    'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all
                    after:duration-300',
                    request()->routeIs('careers')
                    ? 'after:w-full'
                    : 'after:w-0 hover:after:w-full',
                    ])>
                    Careers
                    </a> --}}


                    <a href="{{ route('contact') }}" wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'contact'
                        ),
                        'text-general font-bold' => request()->routeIs('contact'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('contact')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        Contact
                    </a>

                    @if (Auth::check())
                    <a href="{{ Auth::user()?->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                        wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'dashboard', 'admin.dashboard'
                        ),
                        'text-general font-bold' => request()->routeIs('dashboard', 'admin.dashboard'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('dashboard', 'admin.dashboard')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" wire:navigate @class([ 'px-1 py-2 text-sm font-medium transition-colors duration-200 relative' , 'text-white hover:text-general dark:hover:text-general'=> !request()->routeIs(
                        'login'
                        ),
                        'text-general font-bold' => request()->routeIs('login'),
                        'after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-general after:transition-all after:duration-300',
                        request()->routeIs('login')
                        ? 'after:w-full'
                        : 'after:w-0 hover:after:w-full',
                        ])>
                        Login
                    </a>

                    @endif

                    @livewire('components.cart-count')


                    <!-- User Dropdown -->
                    <div class="ml-4 relative">
                        <button x-on:click="userDropDownIsOpen = !userDropDownIsOpen"
                            x-bind:aria-expanded="userDropDownIsOpen"
                            class="flex items-center text-sm rounded-full focus:outline-none ">
                            <img class="h-8 w-8 mb-3 rounded-full border-2 border-transparent hover:border-general transition-colors duration-200"
                                src="{{asset('img/user-1.jpg')}}" alt="User Profile">
                        </button>

                        <div x-cloak x-show="userDropDownIsOpen" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            x-on:click.outside="userDropDownIsOpen = false"
                            class="absolute right-0 mt-2 w-56 origin-top-right overflow-hidden rounded-lg border border-neutral-200 bg-white py-1 text-neutral-900 shadow-lg ring-1 ring-black/5 focus:outline-none">
                            @if(Auth::check())
                            <div class="border-b border-neutral-200 px-4 py-3">
                                <p class="text-sm font-semibold text-neutral-950">
                                    {{ Auth::user()->name}}
                                </p>
                                <p class="text-xs text-neutral-500">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            @else
                            <div class="border-b border-neutral-200 px-4 py-3">

                                <p class="text-xs leading-5 text-neutral-500">
                                    Please log in to access your account.
                                </p>
                            </div>
                            @endif


                            <a href="{{ Auth::user()?->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                                wire:navigate
                                class="block px-4 py-2.5 text-sm font-medium text-neutral-800 transition hover:bg-general/10 hover:text-neutral-950">
                                Dashboard
                            </a>


                            </a>
                            @if(Auth::check())
                            <div class="mt-1 border-t border-neutral-200">
                                <a href="#" wire:click.prevent="logout"
                                    class="block px-4 py-2.5 text-sm font-medium text-red-700 transition hover:bg-red-50">
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
        class="font-bungee fixed inset-y-0 left-0 z-70 flex w-[min(19rem,calc(100vw-1rem))] max-h-dvh flex-col overflow-hidden border-r border-neutral-200 bg-white shadow-2xl"
        @click.away="mobileMenuIsOpen = false">

        <div class="flex items-center justify-between border-b border-neutral-200 px-4 py-4">
            <a href="/" wire:navigate class="text-xl font-bold text-neutral-950">
                <span>Sol<span class="text-general">ara</span></span>
            </a>
            <button x-on:click="mobileMenuIsOpen = false"
                class="rounded-md p-2 text-neutral-500 hover:bg-neutral-100 hover:text-general">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto px-3 py-4">
            @if (Auth::check())
                <div class="mb-4 rounded-2xl border border-neutral-200 bg-neutral-50 px-3 py-3">
                    <div class="flex items-center gap-3">
                        <img class="h-10 w-10 rounded-full border-2 border-general" src="{{ asset('img/user-1.jpg') }}"
                            alt="User Profile">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-neutral-950">{{ Auth::user()->name }}</p>
                            <p class="truncate text-xs text-neutral-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" wire:navigate x-on:click="mobileMenuIsOpen = false"
                    class="mb-4 block rounded-2xl border border-neutral-200 bg-neutral-50 px-3 py-3 transition hover:border-general hover:bg-general/5">
                    <div class="flex items-center gap-3">
                        <img class="h-10 w-10 rounded-full border-2 border-general" src="{{ asset('img/user-1.jpg') }}"
                            alt="Guest account">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-neutral-950">Guest</p>
                            <p class="truncate text-xs text-neutral-500">Sign in or sign up to manage your account</p>
                        </div>
                    </div>
                </a>
                <flux:button :href="route('login')" icon="arrow-right-end-on-rectangle" variant="primary"
                    class="mb-4 w-full justify-center" wire:navigate x-on:click="mobileMenuIsOpen = false">
                    Sign in / Sign up
                </flux:button>
            @endif

            <!-- Mobile Navigation -->
            <nav class="space-y-1">
                <a href="{{ route('solutions') }}" wire:navigate
                    x-on:click="mobileMenuIsOpen = false"
                    class="block rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                    Solutions
                </a>
                <a href="{{ route('blog.index') }}" wire:navigate
                    x-on:click="mobileMenuIsOpen = false"
                    class="block rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                    Blog
                </a>
                <a href="{{ route('about') }}" wire:navigate
                    x-on:click="mobileMenuIsOpen = false"
                    class="block rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                    About
                </a>
                <a href="{{ route('contact') }}" wire:navigate
                    x-on:click="mobileMenuIsOpen = false"
                    class="block rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                    Contact
                </a>

                <!-- Estimate Link -->
                <a href="{{ route('checkout') }}" wire:navigate
                    x-on:click="mobileMenuIsOpen = false"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                    <flux:icon.shopping-cart class="size-5" />
                    <span>Estimate</span>
                </a>
            </nav>

            <div class="mt-4 border-t border-neutral-200 pt-4">
                @if (Auth::check())
                    <a href="{{ Auth::user()->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                        wire:navigate x-on:click="mobileMenuIsOpen = false"
                        class="block rounded-xl px-3 py-3 text-base font-medium text-neutral-900 hover:bg-neutral-100 hover:text-general">
                        Dashboard
                    </a>
                @endif

                @if (Auth::check())
                <flux:button wire:click="logout" variant="primary" class="mt-3 w-full justify-center rounded-xl">
                    Sign Out
                </flux:button>
                @endif
            </div>
        </div>
    </div>
</div>
