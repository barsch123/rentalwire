<x-layouts.base>
    @section('title', $content->title.' | Solara Journal')
    @section('description', Str::limit(strip_tags($content->content), 155))
    @section('keywords', 'Solara journal, solar energy, '.$content->title)

    <main class="bg-neutral-50 text-zinc-900">
        <article class="mx-auto max-w-6xl px-5 py-14 sm:px-8 lg:px-10 lg:py-20">
            <a href="{{ route('blog.index') }}" wire:navigate class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 bg-white px-4 py-2 text-sm font-bold text-zinc-700 transition hover:border-general hover:text-zinc-950">&larr; Back to journal</a>
            <div class="mx-auto mt-10 max-w-4xl">
                <div class="flex items-center justify-center gap-3 text-xs font-bold uppercase tracking-[0.16em] text-zinc-500"><span class="rounded-full bg-general/15 px-3 py-1 text-xs font-semibold text-[#9a6700]">Solara journal</span><time datetime="{{ optional($content->modified_at)->format('Y-m-d') }}">{{ optional($content->modified_at)->format('M j, Y') }}</time></div>
                <h1 class="mt-6 text-4xl font-bold tracking-tight text-zinc-950 sm:text-5xl">{{ $content->title }}</h1>
            </div>

            @if ($content->blog_photo)
                <div class="mx-auto mt-12 max-w-5xl overflow-hidden rounded-3xl bg-zinc-200"><img src="{{ str_starts_with($content->blog_photo, 'img/') ? asset($content->blog_photo) : asset('storage/' . $content->blog_photo) }}" alt="{{ $content->title }}" class="max-h-[520px] w-full object-cover"></div>
            @endif

            <div class="mx-auto mt-14 grid max-w-5xl gap-12 lg:grid-cols-[minmax(0,1fr)_220px]">
                <div class="prose prose-zinc max-w-none text-[17px] leading-8 prose-headings:font-bold prose-headings:tracking-tight prose-a:text-[#9a6700] prose-a:underline prose-img:rounded-2xl">{!! $content->content !!}</div>
                <aside class="h-fit border-t border-zinc-200 pt-5 lg:sticky lg:top-24"><p class="text-xs font-bold uppercase tracking-[0.16em] text-zinc-500">Article details</p><p class="mt-3 text-sm leading-6 text-zinc-600">Updated {{ optional($content->modified_at)->format('F j, Y') }}</p><a href="{{ route('blog.index') }}" wire:navigate class="mt-5 inline-flex text-sm font-bold text-zinc-900 hover:text-[#9a6700]">Explore all stories &rarr;</a></aside>
            </div>
        </article>

        @if ($relatedBlogs->isNotEmpty())
            <section class="border-t border-zinc-200 bg-white"><div class="mx-auto max-w-6xl px-5 py-14 sm:px-8 lg:px-10"><div class="mb-7 flex items-end justify-between"><div><p class="text-xs font-bold uppercase tracking-[0.16em] text-[#9a6700]">Keep reading</p><h2 class="mt-2 text-2xl font-bold tracking-tight">More from the journal</h2></div><a href="{{ route('blog.index') }}" wire:navigate class="text-sm font-bold text-zinc-600 hover:text-zinc-950">View all &rarr;</a></div><div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($relatedBlogs->where('id', '!=', $content->id)->take(4) as $related)
                    <article class="group rounded-2xl border border-zinc-200 p-5 transition hover:-translate-y-0.5 hover:border-general hover:shadow-sm"><time class="text-xs font-semibold uppercase tracking-[0.12em] text-zinc-500">{{ optional($related->modified_at)->format('M j, Y') }}</time><h3 class="mt-3 line-clamp-2 text-lg font-bold leading-snug group-hover:text-[#9a6700]">{{ $related->title }}</h3><p class="mt-2 line-clamp-2 text-sm leading-6 text-zinc-600">{{ Str::limit(strip_tags($related->content), 90) }}</p><a href="{{ route('blog.details', $related->slug) }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 mt-4 px-3! py-2! text-xs!">Read article <span aria-hidden="true">&rarr;</span></a></article>
                @endforeach
            </div></div></section>
        @endif
    </main>
</x-layouts.base>
