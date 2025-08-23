<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12">

    <!-- Blog Posts Section -->
    <section class="w-full lg:w-2/3 py-12">
        <div class="py-12">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item icon="home" href="{{ route('welcome') }}" />
                <flux:breadcrumbs.item>Blog</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <!-- Search Bar -->
        <div class="relative w-full mb-12 flex items-center justify-start gap-x-2">
            <div class="relative flex items-center">
                <flux:input wire:model.live.debounce.300ms="search"
                    placeholder="Search blogs by title, content, or tags..." icon="magnifying-glass" />
            </div>

            <!-- Search Button -->
            {{-- <div class="flex justify-start">
                <flux:button wire:click="applySearch">
                    {{ __('Search') }}
                </flux:button>
            </div> --}}
        </div>

        <!-- Featured Articles -->
        <h2 class="text-3xl font-bold border-b-2 border-yellow-500 pb-2 mb-8">Featured Articles</h2>
        <article class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            @forelse ($blogs as $blog)
                <div class="p-6 bg-white border rounded-lg shadow-md hover:shadow-lg transition">
                    @if ($blog->blog_photo)
                        <img src="{{ asset('storage/' . $blog->blog_photo) }}" alt="{{ $blog->title }}"
                            class="w-full h-48 object-cover mb-4 rounded-lg">
                    @endif
                    <h3 class="text-xl font-semibold mb-2">{{ $blog->title }}</h3>
                    <p class="text-gray-700 text-sm mb-3 line-clamp-3">{{ $blog->content }}</p>
                    <div class="py-5" x-data="{ animate: false }" x-intersect:enter="animate = true"
                        x-intersect:leave="animate = false" x-intersect:options="{ threshold: 0.5 }" :class="animate
                                    ?
                                    'opacity-100 translate-y-0 transition duration-700' :
                                    'opacity-0 translate-y-10'">
                        <a class="relative inline-flex gap-2 rounded-sm bg-[#ffab00] px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-yellow-600
                           before:absolute before:-z-10 before:top-1 before:left-1 before:w-full before:h-full before:rounded-sm before:bg-neutral-800
                            before:opacity-0 before:transition-opacity before:duration-300 hover:before:opacity-100"
                            href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                            <span class="relative z-10">READ MORE</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <span class="text-gray-400 text-xs italic">Last modified:
                            {{ date_format($blog->modified_at, 'F j, Y, g:i a') }} </span>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No blogs found.</p>
            @endforelse
        </article>

        {{ $blogs->links() }}
    </section>

    <!-- Sidebar -->
    <aside class="w-full lg:w-1/3 py-12">
        <!-- Popular Tags -->
        <h2 class="text-xl font-bold border-b-2 border-yellow-500 pb-2 mb-6">Popular Tags</h2>
        <div class="flex flex-wrap gap-2">
            @foreach ($tags as $tag)
                @if ($tag && $tag->name)
                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                        {{ $tag->name }}
                    </span>
                @endif
            @endforeach
        </div>
    </aside>
</div>