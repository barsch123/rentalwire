<!-- Contact Form -->
<form wire:submit.prevent="submit">
    <div class="grid gap-4">
        <flux:input type="text" wire:model="name" label="Name" placeholder="Name" />
        <flux:input type="email" wire:model="email" label="Email" placeholder="Email" />
        <flux:input type="text" wire:model="contact" label="Contact" placeholder="Phone Number" />
        <flux:textarea wire:model="message" rows="4" label="Message" placeholder="Details" />
        <flux:select label="Contact Method" wire:model="contactMethod">
            <flux:select.option selected>Select a contact method</flux:select.option>
            <flux:select.option>Email</flux:select.option>
            <flux:select.option>SMS</flux:select.option>
            <flux:select.option>Phone</flux:select.option>
        </flux:select>
        <flux:input type="date" wire:model="date" placeholder="When would you like to start?" />
    </div>

    <div class="mt-6">
        <flux:button type="submit">
            Send Inquiry
        </flux:button>

    </div>
</form>