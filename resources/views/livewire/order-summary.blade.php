<div>
    <aside class="hidden lg:sticky lg:top-28 lg:block">
        @include('livewire.partials.order-summary-body')
    </aside>

    <div x-cloak x-show="summaryOpen" x-transition.opacity class="fixed inset-0 z-50 lg:hidden" aria-hidden="true">
        <div class="absolute inset-0 bg-neutral-950/55 backdrop-blur-sm" x-on:click="summaryOpen = false"></div>

        <div x-transition:enter="transition ease-out duration-200" x-transition:enter-start="translate-y-6 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-6 opacity-0"
            class="absolute inset-x-0 bottom-0 z-10 max-h-[88dvh] overflow-y-auto rounded-t-2xl border border-neutral-200 bg-white p-5 shadow-2xl">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="text-lg font-bold text-neutral-950">Order Summary</h2>
                <button type="button" x-on:click="summaryOpen = false" class="rounded-md p-2 text-neutral-500 hover:bg-neutral-100 hover:text-neutral-950" aria-label="Close summary">
                    <flux:icon.x-mark class="size-5" />
                </button>
            </div>

            @include('livewire.partials.order-summary-body')
        </div>
    </div>
</div>
