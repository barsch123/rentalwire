<x-layouts.base>
  <div class="overflow-x-hidden antialiased bg-gray-50">

    <!-- Article Header -->
    <main class="relative bg-white pt-24 pb-16">
      <div class="max-w-3xl mx-auto px-6">
        <address class="flex items-center space-x-4 mb-6">
          <img src="{{ asset('img/user-1.jpg') }}" alt="Author" class="w-16 h-16 rounded-full shadow-md">
          <div>
            <a href="#" rel="author" class="block text-xl font-semibold text-gray-900">{{ $content->author_name ?? 'Lorem Ipsum' }}</a>
            <time datetime="{{ $content->modified_at->format('Y-m-d') }}" class="text-sm text-gray-500">
              Last updated {{ $content->modified_at->format('F j, Y') }}
            </time>
          </div>
        </address>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-8">{{ $content->title }}</h1>
        <div class="prose prose-lg max-w-none text-gray-700">
          {!! $content->content !!}
        </div>
      </div>
    </main>

    <!-- Related Articles -->
    <aside class="py-16">
      <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          @foreach($relatedBlogs as $related)
            @php
              $words = str_word_count(strip_tags($related->content));
              $minutes = max(1, ceil($words / 200));
            @endphp

            <article class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden flex flex-col">
              @if($related->blog_photo)
                <a href="{{ route('blog.details', $related->slug) }}" class="block h-40 overflow-hidden">
                  <img src="{{ asset('storage/' . $related->blog_photo) }}" alt="{{ $related->title }}"
                       class="w-full h-full object-cover">
                </a>
              @endif

              <div class="p-5 flex-1 flex flex-col">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                  <a href="{{ route('blog.details', $related->slug) }}" class="hover:text-yellow-500 transition">
                    {{ Str::limit($related->title, 50) }}
                  </a>
                </h3>
                <p class="text-gray-600 text-sm flex-1 mb-4">{{ Str::limit(strip_tags($related->content), 80) }}</p>

                <div class="flex items-center justify-between text-xs text-gray-500">
                  <time datetime="{{ $related->modified_at->format('Y-m-d') }}">
                    {{ $related->modified_at->format('M j, Y') }}
                  </time>
                  <span>{{ $minutes }} {{ $minutes === 1 ? 'min' : 'mins' }}</span>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </aside>
  </div>
</x-layouts.base>
