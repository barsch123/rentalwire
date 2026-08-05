<div class="mx-auto max-w-7xl px-5 py-12 sm:px-8 lg:px-10 lg:py-16">
    <div class="mb-8 flex flex-col gap-5 border-b border-zinc-200 pb-7 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-zinc-950">Ideas for better energy.</h1>
        </div>
        <div class="w-full sm:max-w-sm">
            <label for="blog-search" class="sr-only">Search articles</label>
            <div class="relative">
                <svg class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
                <input id="blog-search" type="search" wire:model.live.debounce.300ms="search" placeholder="Search articles" class="w-full rounded-lg border border-zinc-300 bg-white py-3 pl-10 pr-3 text-sm text-zinc-900 outline-none transition placeholder:text-zinc-400 focus:border-general focus:ring-2 focus:ring-general/20">
            </div>
        </div>
    </div>

    @if ($blogs->count())
        <div class="mb-6 flex items-center justify-between"><h2 class="text-sm font-bold uppercase tracking-[0.16em] text-zinc-500">Latest articles</h2><span class="text-xs text-zinc-400">{{ $blogs->total() }} {{ Str::plural('article', $blogs->total()) }}</span></div>
        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($blogs as $blog)
                <article class="group flex flex-col overflow-hidden rounded-2xl border border-zinc-200 bg-white transition hover:-translate-y-0.5 hover:border-general hover:shadow-md">
                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate class="block h-48 overflow-hidden bg-zinc-100">
                        @if ($blog->blog_photo)
                            <img src="{{ str_starts_with($blog->blog_photo, 'img/') ? asset($blog->blog_photo) : asset('storage/' . $blog->blog_photo) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="h-full w-full bg-linear-to-br from-zinc-100 to-general/15"></div>
                        @endif
                    </a>
                    <div class="flex flex-1 flex-col p-6">
                        <time datetime="{{ optional($blog->modified_at)->format('Y-m-d') }}" class="text-xs font-semibold uppercase tracking-[0.14em] text-zinc-500">{{ optional($blog->modified_at)->format('M j, Y') }}</time>
                        <h3 class="mt-3 text-xl font-bold leading-snug text-zinc-950"><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate class="hover:text-[#9a6700]">{{ $blog->title }}</a></h3>
                        <p class="mt-3 line-clamp-3 text-sm leading-6 text-zinc-600">{{ Str::limit(strip_tags($blog->content), 145) }}</p>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 mt-5 w-fit px-4! py-2.5!">Read article <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="rounded-2xl border border-dashed border-zinc-300 bg-white px-6 py-16 text-center"><p class="text-lg font-semibold text-zinc-800">No articles found.</p><p class="mt-2 text-sm text-zinc-500">Try a different search term.</p></div>
    @endif

    <div class="mt-12">
        <flux:pagination :paginator="$blogs" />
    </div>
</div>
