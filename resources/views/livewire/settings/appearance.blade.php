<main class="min-h-screen bg-white pb-24 pt-28 text-neutral-950">
    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <div class="space-y-5">
            <fieldset x-data>
                <legend class="mb-3 text-sm font-medium text-neutral-800">Color mode</legend>

                <div class="grid gap-3 sm:grid-cols-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="appearance" value="light" x-model="$flux.appearance" class="peer sr-only">
                        <span class="flex h-12 items-center justify-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 text-neutral-800 transition hover:border-neutral-400 peer-checked:border-[#9a6700] peer-checked:bg-amber-50 peer-checked:text-neutral-950 peer-focus-visible:ring-2 peer-focus-visible:ring-[#9a6700] peer-focus-visible:ring-offset-2">
                            <flux:icon.sun class="size-5 shrink-0" />
                            <span class="text-sm font-semibold">{{ __('Light') }}</span>
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="appearance" value="dark" x-model="$flux.appearance" class="peer sr-only">
                        <span class="flex h-12 items-center justify-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 text-neutral-800 transition hover:border-neutral-400 peer-checked:border-[#9a6700] peer-checked:bg-amber-50 peer-checked:text-neutral-950 peer-focus-visible:ring-2 peer-focus-visible:ring-[#9a6700] peer-focus-visible:ring-offset-2">
                            <flux:icon.moon class="size-5 shrink-0" />
                            <span class="text-sm font-semibold">{{ __('Dark') }}</span>
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="appearance" value="system" x-model="$flux.appearance" class="peer sr-only">
                        <span class="flex h-12 items-center justify-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 text-neutral-800 transition hover:border-neutral-400 peer-checked:border-[#9a6700] peer-checked:bg-amber-50 peer-checked:text-neutral-950 peer-focus-visible:ring-2 peer-focus-visible:ring-[#9a6700] peer-focus-visible:ring-offset-2">
                            <flux:icon.computer-desktop class="size-5 shrink-0" />
                            <span class="text-sm font-semibold">{{ __('System') }}</span>
                        </span>
                    </label>
                </div>
            </fieldset>
            <p class="text-sm leading-6 text-neutral-500">System mode follows the appearance preference configured on your device.</p>
        </div>
    </x-settings.layout>
</main>
