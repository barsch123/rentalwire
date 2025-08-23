<form wire:submit.prevent="submit" class="mt-6 space-y-4">
    <div>
        <flux:input label="Name" id="name" wire:model.defer="name" />
    </div>

    <div>
        <flux:input label="Email" type="email" id="email" wire:model.defer="email" />
    </div>

    <div>
        <flux:input label="Phone Number" type="tel" id="phone" wire:model.defer="phone" />
    </div>

    <div>
        <flux:select label="Position Applied For" id="position" wire:model.defer="position">
            <flux:select.option value="">Select a position</flux:select.option>
            <flux:select.option>Equipment Operator</flux:select.option>
            <flux:select.option>Sales Representative</flux:select.option>
            <flux:select.option>Mechanic / Equipment Maintenance Specialist</flux:select.option>
        </flux:select>
    </div>

    <div>
        <flux:input type="file" label="Resume" id="resume" wire:model="resume" />
    </div>

    <div>
        <flux:input type="file" label="Cover Letter" id="coverLetter" wire:model="coverLetter" />
    </div>

    <div>
        <flux:button type="submit" label="Submit" class="bg-[#ffab00]! text-white!" wire:loading.attr="disabled">Submit
            Application</flux:button>
    </div>
</form>