<main class="min-h-screen bg-white px-5 pb-20 pt-32 text-neutral-950 sm:px-8">
        <div class="mx-auto max-w-6xl">
            <header class="max-w-2xl">
                <p class="text-sm font-semibold text-[#9a6700]">E-service support</p>
                <h1 class="mt-2 text-3xl font-bold sm:text-4xl">How can we help?</h1>
                <p class="mt-3 text-base leading-7 text-neutral-600">Search common questions or send an issue directly to the support team.</p>
            </header>

            <div class="mt-10 grid gap-12 lg:grid-cols-[minmax(0,1fr)_24rem]">
                <section>
                    <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="Search support answers" aria-label="Search support answers" />
                    <div class="mt-6 divide-y divide-neutral-200 border-y border-neutral-200">
                        @forelse ($faqs as $faq)
                            <details class="group py-5" wire:key="faq-{{ md5($faq['question']) }}">
                                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold">
                                    {{ $faq['question'] }}
                                    <flux:icon.chevron-down class="size-4 shrink-0 transition group-open:rotate-180" />
                                </summary>
                                <p class="mt-3 max-w-2xl text-sm leading-6 text-neutral-600">{{ $faq['answer'] }}</p>
                            </details>
                        @empty
                            <p class="py-6 text-sm text-neutral-500">No matching answers. Send your question using the form.</p>
                        @endforelse
                    </div>
                </section>

                <form wire:submit="submit" class="grid gap-5 border-l-0 border-neutral-200 lg:border-l lg:pl-8">
                    <h2 class="text-xl font-bold">Email support</h2>
                    <flux:input wire:model="name" label="Name" />
                    <flux:input wire:model="email" type="email" label="Email" />
                    <flux:input wire:model="subject" label="Subject" />
                    <flux:textarea wire:model="message" label="Issue details" rows="5" />
                    <flux:checkbox wire:model="joinMailingList" label="Email me solar tips and service updates" />
                    <flux:button type="submit" variant="primary" icon="paper-airplane">Send request</flux:button>
                </form>
            </div>
        </div>
</main>
