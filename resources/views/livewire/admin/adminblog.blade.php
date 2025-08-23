<div class="grid lg:grid-cols-3 gap-6">
    <!-- Left Column: Blog Form (Create/Edit) -->
    <div class="col-span-1 bg-neutral-800 border border-neutral-700 rounded-xl p-6">
        <h2 class="text-xl font-semibold text-white mb-4">
            {{ $isEdit ? 'Edit Blog Post' : 'Create New Blog Post' }}
        </h2>

        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
            <flux:input label="Title" id="title" wire:model="title" type="text" placeholder="Title" />
            <flux:input label="Content" id="content" wire:model="content" placeholder="Content" />
            <flux:input label="Image" type="file" id="blog_photo" wire:model="blog_photo" />
            <flux:input label="Tags" id="tagsInput" wire:model="tagsInput" type="text"
                placeholder="Comma-separated tags" />

            <div class="flex justify-between pt-2">
                <flux:button variant="primary" type="submit">
                    {{ $isEdit ? 'Update Blog' : 'Create Blog' }}
                </flux:button>
                @if($isEdit)
                    <flux:button variant="primary" color="amber" wire:click="cancelEdit" type="button">
                        Cancel
                    </flux:button>
                @endif
            </div>
        </form>
    </div>

    <!-- Right Column: Blog List -->
    <div class="col-span-2 bg-neutral-900 border border-neutral-700 rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-white">All Blog Posts</h2>
            <form wire:submit.prevent="deleteAllTags">
                <flux:button variant="danger" type="submit">
                    Delete All Tags
                </flux:button>
            </form>
        </div>

        <div class="space-y-4">
            @forelse ($blogs as $blog)
                <div
                    class="rounded-xl bg-neutral-800 border border-neutral-700 p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-sm">
                    <div class="space-y-1 text-white">
                        <h3 class="text-xl font-bold">{{ $blog->title }}</h3>
                        <p class="text-sm text-neutral-300">
                            <span class="text-yellow-400 font-medium">Tags:</span>
                            {{ $blog->tags->pluck('name')->implode(', ') ?: 'None' }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <flux:button wire:click="edit({{ $blog->id }})" color="primary" size="sm">
                            Edit
                        </flux:button>
                        <flux:button wire:click="delete({{ $blog->id }})" color="danger" size="sm">
                            Delete
                        </flux:button>
                    </div>
                </div>
            @empty
                <div class="text-neutral-400 text-center py-10 border border-dashed border-neutral-700 rounded-xl">
                    No blog posts found.
                </div>
            @endforelse
        </div>
    </div>
</div>
