<div>
    <flux:modal x-data="{}" name="modal" class="md:w-[28rem]">
        <template x-if="$store.modal.view === 'prompt'">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete Rental Equipment</flux:heading>
                    <flux:text class="mt-2">
                        Are you certain you want to delete this rental equipment? This action is permanent and cannot be
                        undone.
                    </flux:text>
                </div>

                <div class="flex justify-between items-center">
                    <flux:button type="button" variant="primary" x-on:click="$flux.modal('modal').close()">Cancel
                    </flux:button>
                    <flux:button type="submit" wire:click="deleteEquipment" variant="danger">Delete
                    </flux:button>
                </div>
            </div>
        </template>

        <template x-if="$store.modal.view === 'edit'">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit Rental Equipment</flux:heading>
                    <flux:text class="mt-2">Make changes to the rental equipment details below.</flux:text>
                </div>

                <flux:callout variant="warning" icon="exclamation-circle"
                    heading="Note: Changing the name will automatically regenerate the slug." />

                <form wire:submit.prevent="updateEquipment">
                    <div>
                        <flux:input label="Name" wire:model="name" placeholder="Enter equipment name" />
                        <flux:input label="Description" wire:model="description"
                            placeholder="Enter equipment description" />
                        <flux:input label="Price" wire:model="price" placeholder="Enter rental price" />
                        <flux:input label="Category" wire:model="category" placeholder="Select category" />
                        <flux:input label="Subcategory" wire:model="subcategory"
                            placeholder="Select subcategory (optional)" />
                        <flux:input label="Photo URL" type="file" wire:model="newphoto" />
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <flux:button type="button" variant="primary" x-on:click="$flux.modal('modal').close()">Cancel
                        </flux:button>
                        <flux:button type="submit" variant="danger">Save Changes</flux:button>
                    </div>
                </form>
            </div>
        </template>
    </flux:modal>


    <div class="flex flex-col" x-data="{ showDeleteModal: false }">
        <!-- Search Bar -->
        <div
            class="flex items-center justify-between p-4 bg-white dark:bg-neutral-800 rounded-t-lg border-b border-gray-200 dark:border-neutral-700">
            <div>
                <flux:input wire:model.live.debounce.500ms="search" placeholder="Search equipment…"
                    prefix-icon="magnifying-glass" class="relative w-full block pl-10 pr-2" />
            </div>

            <div class="flex space-x-3">
                <flux:button class="bg-[#ffa00]">
                    Add Equipment
                </flux:button>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-neutral-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-neutral-700 dark:text-neutral-300">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        @foreach ($columns as $column)
                            @if ($column['key'] === 'category')
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                            @elseif($column['key'] !== 'subcategory')
                                <th scope="col" class="px-6 py-3">
                                    {{ $column['label'] }}
                                </th>
                            @endif
                        @endforeach
                        <th scope="col" class="px-6 py-3 text-right">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rentalEquipment as $rentals)
                        <tr
                            class="bg-white border-b dark:bg-neutral-800 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-600 transition duration-200 ease-in-out">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-{{ $rentals->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-{{ $rentals->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rentals->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rentals->name }}
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate">
                                {{ $rentals->description }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $rentals->photo) }}" alt="{{ $rentals->name }}"
                                    class="size-12 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate">
                                {{ $rentals->price }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-medium">{{ $rentals->category }}</span>
                                    @if ($rentals->subcategory)
                                        <span
                                            class="text-xs text-gray-500 dark:text-neutral-400">{{ $rentals->subcategory }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">

                                    <flux:modal.trigger name="modal">
                                        <button wire:click="editEquipment({{ $rentals->id }})"
                                            x-on:click="$store.modal.view = 'edit'"
                                            class="p-1.5 text-yellow-500 hover:text-white hover:bg-yellow-500 rounded-lg transition-colors duration-200"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </flux:modal.trigger>
                                    <flux:modal.trigger name="modal">
                                        <button wire:click="$set('selectedId', {{ $rentals->id }})"
                                            x-on:click="$store.modal.view = 'prompt'"
                                            class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-lg transition-colors duration-200"
                                            title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </flux:modal.trigger>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <!-- Icon -->
                                    <div class="p-4 bg-gray-100 dark:bg-neutral-700 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-10 w-10 text-gray-400 dark:text-neutral-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>

                                    <!-- Message -->
                                    <div class="space-y-1">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">No rental equipment
                                            found</h3>
                                        <p class="text-gray-500 dark:text-neutral-400 max-w-md">
                                            We couldn't find any equipment matching your criteria. Try adjusting your search
                                            or add new equipment.
                                        </p>
                                    </div>

                                    <!-- Action Button -->
                                    <flux:button
                                        class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2 -mt-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add New Equipment
                                    </flux:button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="py-4 px-4">
            {{ $rentalEquipment->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</div>