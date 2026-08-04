<div class="space-y-8">
    @unless ($reviewsOnly)
        <div class="flex flex-wrap items-center gap-3 pt-5">
        @auth
            <flux:button wire:click="toggleWishlist" :icon="$isWishlisted ? 'heart' : 'heart'" variant="outline">
                {{ $isWishlisted ? 'Remove from wishlist' : 'Save to wishlist' }}
            </flux:button>
            <span class="text-sm text-neutral-500">Saved items remain linked to your account.</span>
        @else
            <flux:button :href="route('login')" wire:navigate icon="heart" variant="outline">Log in to save</flux:button>
        @endauth
        </div>
    @endunless

    @if ($reviewsOnly)
        <section class="pt-6" id="reviews">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-neutral-950">Customer reviews</h2>
                <p class="mt-1 text-sm text-neutral-500">
                    {{ number_format((float) ($equipment->reviews_avg_rating ?? 0), 1) }} out of 5 · {{ $equipment->reviews_count ?? 0 }} reviews
                </p>
            </div>
        </div>

        @auth
            <form wire:submit="saveReview" class="mt-6 grid gap-4 rounded-md border border-neutral-200 bg-neutral-50 p-5">
                <flux:select wire:model="rating" label="Rating">
                    @foreach ([5, 4, 3, 2, 1] as $value)
                        <flux:select.option :value="$value">{{ $value }} stars</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:textarea wire:model="comment" label="Your review" placeholder="Describe your consultation or installation experience" />
                <div><flux:button type="submit" variant="primary">Publish review</flux:button></div>
            </form>
        @else
            <p class="mt-5 text-sm text-neutral-600"><a class="font-semibold text-blue-700 underline" href="{{ route('login') }}">Log in</a> to write a verified customer review.</p>
        @endauth

        <div class="mt-6 divide-y divide-neutral-200">
            @forelse ($equipment->reviews as $review)
                <article class="py-5" wire:key="review-{{ $review->id }}">
                    <div class="flex items-center justify-between gap-4">
                        <p class="font-semibold text-neutral-950">{{ $review->user->name }}</p>
                        <span class="text-sm text-[#9a6700]">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span>
                    </div>
                    <p class="mt-2 text-sm leading-6 text-neutral-600">{{ $review->comment }}</p>
                    <time class="mt-2 block text-xs text-neutral-400">{{ $review->created_at->diffForHumans() }}</time>
                </article>
            @empty
                <p class="py-6 text-sm text-neutral-500">No customer reviews yet.</p>
            @endforelse
        </div>
        </section>
    @endif
</div>
