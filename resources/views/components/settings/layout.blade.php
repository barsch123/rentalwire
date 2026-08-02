<div class="mx-auto max-w-6xl px-5 sm:px-8">
    <header class="border-b border-neutral-200 pb-8">
        <a href="{{ route('dashboard') }}" wire:navigate class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-600 transition hover:text-neutral-950">
            <flux:icon.arrow-left class="size-4" />
            Back to account
        </a>
        <p class="mt-8 text-sm font-semibold text-[#9a6700]">Customer account</p>
        <h1 class="mt-2 text-3xl font-bold text-neutral-950 sm:text-4xl">Account settings</h1>
        <p class="mt-3 max-w-2xl text-base leading-7 text-neutral-600">Manage your identity, security, and display preferences.</p>
    </header>

    <nav class="flex gap-1 overflow-x-auto border-b border-neutral-200 py-5" aria-label="Account settings">
        <a href="{{ route('settings.profile') }}" wire:navigate @class(['shrink-0 border-b-2 px-4 py-2 text-sm font-semibold transition', 'border-[#9a6700] text-neutral-950' => request()->routeIs('settings.profile'), 'border-transparent text-neutral-500 hover:text-neutral-950' => ! request()->routeIs('settings.profile')])>Profile</a>
        <a href="{{ route('settings.password') }}" wire:navigate @class(['shrink-0 border-b-2 px-4 py-2 text-sm font-semibold transition', 'border-[#9a6700] text-neutral-950' => request()->routeIs('settings.password'), 'border-transparent text-neutral-500 hover:text-neutral-950' => ! request()->routeIs('settings.password')])>Password</a>
        <a href="{{ route('settings.appearance') }}" wire:navigate @class(['shrink-0 border-b-2 px-4 py-2 text-sm font-semibold transition', 'border-[#9a6700] text-neutral-950' => request()->routeIs('settings.appearance'), 'border-transparent text-neutral-500 hover:text-neutral-950' => ! request()->routeIs('settings.appearance')])>Appearance</a>
    </nav>

    <div class="grid gap-10 py-10 lg:grid-cols-[15rem_minmax(0,1fr)]">
        <div>
            <h2 class="text-xl font-bold text-neutral-950">{{ $heading ?? '' }}</h2>
            <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $subheading ?? '' }}</p>
        </div>
        <div class="w-full max-w-xl">
            {{ $slot }}
        </div>
    </div>
</div>
