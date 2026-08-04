<div class="space-y-6 p-4 sm:p-6">
    <header>
        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-amber-700 dark:text-amber-400">Admin workspace</p>
        <flux:heading size="xl" class="mt-1">Operations overview</flux:heading>
        <flux:text class="mt-2">Monitor publishing activity and continue into the dedicated management areas.</flux:text>
    </header>

    <div class="grid gap-6 xl:grid-cols-[minmax(0,2fr)_minmax(18rem,1fr)]">
        <flux:card>
            <flux:heading size="lg">Publishing activity</flux:heading>
            <flux:text class="mt-2">A read-only summary of current blog publishing status.</flux:text>
            <div class="mt-6">
                <livewire:charts />
            </div>
        </flux:card>

        <div class="grid content-start gap-4">
            <flux:card class="space-y-4">
                <div>
                    <flux:heading size="lg">Solution catalog</flux:heading>
                    <flux:text class="mt-2">Create, update, and retire customer-facing solar offerings.</flux:text>
                </div>
                <flux:button :href="route('solutions.index')" wire:navigate variant="primary" icon="arrow-right">
                    Manage solutions
                </flux:button>
            </flux:card>

            <flux:card class="space-y-4">
                <div>
                    <flux:heading size="lg">Blog publishing</flux:heading>
                    <flux:text class="mt-2">Manage articles, publication status, and catalog education content.</flux:text>
                </div>
                <flux:button :href="route('adminblog.index')" wire:navigate variant="outline" icon="arrow-right">
                    Manage blogs
                </flux:button>
            </flux:card>
        </div>
    </div>
</div>
