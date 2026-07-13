<div class="space-y-6">
    <flux:field>
        <flux:label class="text-base! text-neutral-800!">Category</flux:label>
        <flux:select wire:model.change.live="tempSelectedCategory" wire:key="category-filter-{{ $filterInstance }}">
            <flux:select.option value="">All categories</flux:select.option>
            @foreach ($categories as $category)
                <flux:select.option value="{{ $category }}">{{ $category }}</flux:select.option>
            @endforeach
        </flux:select>
    </flux:field>

    <flux:field>
        <flux:label class="text-base! text-neutral-800!">Subcategory</flux:label>
        <flux:select wire:model="tempSelectedSubcategory"
            wire:key="subcategories-{{ $filterInstance }}-{{ $tempSelectedCategory ?: 'all' }}"
            :disabled="empty($subcategories)">
            <flux:select.option value="">All subcategories</flux:select.option>
            @foreach ($subcategories as $subcategory)
                <flux:select.option value="{{ $subcategory }}">{{ $subcategory }}</flux:select.option>
            @endforeach
        </flux:select>
    </flux:field>

    <fieldset>
        <legend class="mb-2 text-base font-medium text-neutral-800">Price range</legend>
        <div class="grid grid-cols-2 gap-2">
            <flux:input wire:model="tempMinPrice" type="number" min="0" placeholder="Min" aria-label="Minimum price" />
            <flux:input wire:model="tempMaxPrice" type="number" min="0" placeholder="Max" aria-label="Maximum price" />
        </div>
    </fieldset>

    <flux:field>
        <flux:label class="text-base! text-neutral-800!">Sort by</flux:label>
        <flux:select wire:model="tempSortOption">
            <flux:select.option value="newest">Newest first</flux:select.option>
            <flux:select.option value="priceLowHigh">Price: Low to high</flux:select.option>
            <flux:select.option value="priceHighLow">Price: High to low</flux:select.option>
            <flux:select.option value="nameAZ">Name: A - Z</flux:select.option>
            <flux:select.option value="nameZA">Name: Z - A</flux:select.option>
        </flux:select>
    </flux:field>

    <div class="grid grid-cols-2 gap-2 border-t border-neutral-200 pt-5">
        <flux:button wire:click="applyFilters" @click="filtersOpen = false" variant="primary"
            class="rounded-lg! data-loading:pointer-events-none data-loading:opacity-60">Apply</flux:button>
        <flux:button wire:click="resetFilters" variant="ghost" class="rounded-lg! border! border-neutral-200! text-neutral-700!">Clear</flux:button>
    </div>
</div>
