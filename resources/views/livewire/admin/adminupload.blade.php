<div class="p-4 sm:p-6">
    <div class="grid gap-6 xl:grid-cols-1">
        <section class="order-2 rounded-lg border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
           
            <flux:heading size="xl" class="mt-1">Add solar offering</flux:heading>
            <flux:text class="mt-2">
                Create catalog entries for panels, storage, inverters, maintenance, and custom service packages.
            </flux:text>

            <form wire:submit.prevent="save" class="mt-6 space-y-5">
                <flux:input label="Solution name" wire:model="name" placeholder="Commercial Solar Array" />
                <flux:input label="Starting price" wire:model="price" type="number" placeholder="2500000" />
                <flux:input label="Description" wire:model="description"
                    placeholder="Short customer-facing scope and benefits" />

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-1">
                    <flux:select label="Category" wire:model.lazy="category">
                        <flux:select.option value="">Select category</flux:select.option>
                        @foreach (array_keys($allSubcategories) as $cat)
                            <flux:select.option value="{{ $cat }}">{{ $cat }}</flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:select label="Subcategory" wire:model="subcategory" :disabled="empty($currentSubcategories)">
                        <flux:select.option value="">Select subcategory</flux:select.option>
                        @foreach ($currentSubcategories as $subcat)
                            <flux:select.option value="{{ $subcat }}">{{ $subcat }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </div>

                <div>
                    <flux:input type="file" label="Catalog image" wire:model="photo" />
                    <p class="mt-2 text-xs text-zinc-500">PNG, JPG, WEBP, SVG, and GIF are allowed up to 2 MB.</p>
                </div>

                @if ($photo)
                    <div class="mx-auto flex h-40 w-full max-w-md items-center justify-center overflow-hidden rounded-lg border border-zinc-200 bg-zinc-100 p-3 dark:border-zinc-700 dark:bg-zinc-800">
                        <img src="{{ $photo->temporaryUrl() }}" class="size-full object-contain" alt="Solution image preview" />
                    </div>
                @endif

                @if (session()->has('message'))
                    <flux:callout variant="success" icon="check-circle" :heading="session('message')" />
                @endif

                @if (session()->has('error'))
                    <flux:callout variant="danger" icon="exclamation-triangle" :heading="session('error')" />
                @endif

                <flux:button type="submit" variant="primary" class="w-full data-loading:opacity-60">
                    Add Solution
                </flux:button>
            </form>
        </section>

        <section class="order-1 rounded-lg border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700 dark:text-emerald-400">
                Catalog manager
            </p>
            <flux:heading size="xl" class="mt-1">Solar solutions catalog</flux:heading>
            <flux:text class="mt-2">
                Search, edit, and retire solution entries from the public explorer.
            </flux:text>

            <div class="mt-6">
                <livewire:rental-table />
            </div>
        </section>
    </div>
</div>
