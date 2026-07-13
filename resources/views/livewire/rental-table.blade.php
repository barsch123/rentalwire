<div>
    <flux:modal x-data="{}" name="modal" class="md:w-[32rem]">
        <template x-if="$store.modal.view === 'prompt'">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete Solar Solution</flux:heading>
                    <flux:text class="mt-2">
                        This removes the solution from the public explorer and cannot be undone.
                    </flux:text>
                </div>

                <div class="flex justify-end gap-3">
                    <flux:button type="button" variant="ghost" x-on:click="$flux.modal('modal').close()">Cancel</flux:button>
                    <flux:button type="submit" wire:click="deleteEquipment" variant="danger">Delete</flux:button>
                </div>
            </div>
        </template>

        <template x-if="$store.modal.view === 'edit'">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit Solar Solution</flux:heading>
                    <flux:text class="mt-2">Update the public catalog details.</flux:text>
                </div>

                <flux:callout variant="warning" icon="exclamation-circle"
                    heading="Changing the name automatically regenerates the slug." />

                <form wire:submit.prevent="updateEquipment" class="space-y-4">
                    <flux:input label="Name" wire:model="name" placeholder="Enter solution name" />
                    <flux:input label="Description" wire:model="description" placeholder="Enter solution description" />
                    <div class="grid gap-4 sm:grid-cols-2">
                        <flux:input label="Price" wire:model="price" placeholder="Enter estimated price" />
                        <flux:input label="Category" wire:model="category" placeholder="Select category" />
                    </div>
                    <flux:input label="Subcategory" wire:model="subcategory" placeholder="Select subcategory" />
                    <flux:input label="Photo" type="file" wire:model="newphoto" />

                    <div class="flex justify-end gap-3">
                        <flux:button type="button" variant="ghost" x-on:click="$flux.modal('modal').close()">Cancel</flux:button>
                        <flux:button type="submit" variant="primary">Save Changes</flux:button>
                    </div>
                </form>
            </div>
        </template>
    </flux:modal>

    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <flux:input wire:model.live.debounce.500ms="search" placeholder="Search solutions..."
                prefix-icon="magnifying-glass" class="sm:max-w-sm" />
            <div class="text-sm text-zinc-500">
                {{ $rentalEquipment->total() }} total offerings
            </div>
        </div>

        <div class="overflow-hidden rounded-lg border border-zinc-200 dark:border-zinc-700">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-zinc-200 text-left text-sm dark:divide-zinc-700">
                    <thead class="bg-zinc-50 text-xs uppercase tracking-wide text-zinc-500 dark:bg-zinc-800 dark:text-zinc-400">
                        <tr>
                            <th class="px-4 py-3">Solution</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 bg-white dark:divide-zinc-800 dark:bg-zinc-900">
                        @forelse ($rentalEquipment as $rentals)
                            <tr wire:key="solution-row-{{ $rentals->id }}">
                                <td class="px-4 py-4">
                                    <div class="flex min-w-72 items-center gap-3">
                                        <img src="{{ Str::startsWith($rentals->photo, 'http') ? $rentals->photo : asset('storage/' . $rentals->photo) }}"
                                            alt="{{ $rentals->name }}" class="size-14 rounded-lg object-cover">
                                        <div class="min-w-0">
                                            <div class="font-bold text-zinc-950 dark:text-white">{{ $rentals->name }}</div>
                                            <div class="mt-1 max-w-md truncate text-xs text-zinc-500">
                                                {{ $rentals->description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="font-semibold text-zinc-800 dark:text-zinc-200">{{ $rentals->category }}</div>
                                    @if ($rentals->subcategory)
                                        <div class="mt-1 text-xs text-zinc-500">{{ $rentals->subcategory }}</div>
                                    @endif
                                </td>
                                <td class="px-4 py-4 font-black text-zinc-950 dark:text-white">
                                    ${{ number_format($rentals->price, 0) }}
                                </td>
                                <td class="px-4 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <flux:modal.trigger name="modal">
                                            <flux:button size="sm" variant="ghost" wire:click="editEquipment({{ $rentals->id }})"
                                                x-on:click="$store.modal.view = 'edit'">
                                                Edit
                                            </flux:button>
                                        </flux:modal.trigger>
                                        <flux:modal.trigger name="modal">
                                            <flux:button size="sm" variant="danger"
                                                wire:click="$set('selectedId', {{ $rentals->id }})"
                                                x-on:click="$store.modal.view = 'prompt'">
                                                Delete
                                            </flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="mx-auto flex size-12 items-center justify-center rounded-lg bg-zinc-100 text-zinc-500">
                                        <flux:icon.magnifying-glass class="size-6" />
                                    </div>
                                    <h3 class="mt-4 text-lg font-black text-zinc-950 dark:text-white">No solar solutions found</h3>
                                    <p class="mx-auto mt-2 max-w-md text-sm text-zinc-500">
                                        Adjust your search or add a new solution from the form.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <flux:pagination :paginator="$rentalEquipment" />
        </div>
    </div>
</div>
