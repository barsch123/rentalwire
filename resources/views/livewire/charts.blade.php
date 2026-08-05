@php
    $maximumCount = max(1, collect($monthlyCounts)->max('count'));
@endphp

<div class="space-y-6" data-admin-chart>
    <div class="grid gap-3 sm:grid-cols-3" aria-label="Publishing summary">
        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:text class="text-xs font-medium uppercase tracking-wide">Published</flux:text>
            <flux:heading size="lg" class="mt-1">{{ $published }}</flux:heading>
        </div>
        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:text class="text-xs font-medium uppercase tracking-wide">Untagged</flux:text>
            <flux:heading size="lg" class="mt-1">{{ $untagged }}</flux:heading>
        </div>
        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:text class="text-xs font-medium uppercase tracking-wide">Drafts</flux:text>
            <flux:heading size="lg" class="mt-1">{{ $drafts }}</flux:heading>
        </div>
    </div>

    <div role="img" aria-label="Published articles over the last six months" class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
        <div class="mb-4 flex items-center justify-between gap-4">
            <flux:text class="font-medium">Published articles over the last six months</flux:text>
            <flux:text class="text-xs text-zinc-500">Articles</flux:text>
        </div>

        <div class="flex h-52 items-end gap-2 border-b border-zinc-200 sm:gap-4 dark:border-zinc-700">
            @foreach ($monthlyCounts as $month)
                @php
                    $barHeight = $month['count'] > 0 ? max(10, ($month['count'] / $maximumCount) * 100) : 4;
                @endphp

                <div class="flex min-w-0 flex-1 flex-col items-center justify-end gap-2" title="{{ $month['full_label'] }}: {{ $month['count'] }} articles">
                    <flux:text class="text-xs">{{ $month['count'] }}</flux:text>
                    <div class="flex h-36 w-full items-end justify-center">
                        <div class="w-full max-w-12 rounded-t-lg bg-amber-500 transition-all dark:bg-amber-400" style="height: {{ $barHeight }}%"></div>
                    </div>
                    <flux:text class="text-xs text-zinc-500">{{ $month['label'] }}</flux:text>
                </div>
            @endforeach
        </div>
    </div>
</div>
