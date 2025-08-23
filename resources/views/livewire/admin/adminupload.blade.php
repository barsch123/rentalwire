<div>
    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
        <div class="p-4 md:p-5 min-h-[410px] flex flex-col border dark:border-neutral-700 shadow-sm rounded-xl">
            <flux:heading size="xl">Rental Equipment</flux:heading>
            <flux:text class="mt-2">Add new product</flux:text>
            <div class="mt-4">
                <form wire:submit.prevent="save">
                    <flux:field>
                        <div>
                            <flux:input label='Name' wire:model="name" />
                        </div>

                        <div class="py-2">
                            <flux:input label='Price' wire:model="price" />
                        </div>
                        <div class=py-2>
                            <flux:input label='Description' wire:model="description" />
                        </div>
                        <div>
                            <flux:select label="Category" wire:model.lazy="category" >
                                <flux:select.option value="">Select a category</flux:select.option>
                                @foreach (array_keys($allSubcategories) as $cat)
                                    <flux:select.option value="{{ $cat }}">{{ $cat }}
                                    </flux:select.option>
                                @endforeach
                            </flux:select>
                        </div>

                        <div class="mt-4">
                            <flux:select label="Subcategory" wire:model="subcategory" >
                                <flux:select.option value="">Select a subcategory</flux:select.option>
                                @foreach ($currentSubcategories as $subcat)
                                    <flux:select.option value="{{ $subcat }}">{{ $subcat }}
                                    </flux:select.option>
                                @endforeach
                            </flux:select>
                        </div>


                        <div class="py-2">
                            <flux:input type="file" label='Photo' wire:model="photo" />
                            <p class="text-xs text-gray-400 mt-2">PNG, JPG, SVG, WEBP, and GIF are allowed.</p>
                        </div>
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}"
                                class="mt-4 object-cover size-36 rounded-lg shadow-md" alt="Product Image" />
                        @endif
                        <flux:button type="submit" variant="primary">Add Product</flux:button>
                    </flux:field>
                </form>
            </div>
        </div>
    </div>
</div>
