<?php

namespace App\Livewire;

use App\Models\Newsletter;
use App\Models\SupportRequest;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.base')]
class SupportCenter extends Component
{
    public string $search = '';

    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public bool $joinMailingList = false;

    public function mount(): void
    {
        $this->name = Auth::user()?->name ?? '';
        $this->email = Auth::user()?->email ?? '';
    }

    public function submit(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'joinMailingList' => ['boolean'],
        ]);

        unset($validated['joinMailingList']);
        SupportRequest::create([...$validated, 'user_id' => Auth::id(), 'status' => 'open']);

        if ($this->joinMailingList) {
            Newsletter::query()->updateOrCreate(['email' => $this->email], ['status' => 'subscribed']);
        }

        $this->reset(['subject', 'message', 'joinMailingList']);
        Flux::toast(text: 'A support specialist will reply by email.', heading: 'Request received', variant: 'success');
    }

    public function render(): View
    {
        $faqs = collect([
            ['question' => 'How do I request a solar estimate?', 'answer' => 'Add available solutions to your estimate cart, review the total, and submit your contact details.'],
            ['question' => 'What does availability mean?', 'answer' => 'Available items can be included in a new proposal. Limited items may require confirmation before installation.'],
            ['question' => 'How do membership discounts work?', 'answer' => 'Member discounts are attached to your account and applied automatically to eligible estimate items.'],
            ['question' => 'Can I change or remove an item?', 'answer' => 'Open your estimate cart to remove individual solutions or clear the entire estimate.'],
        ])->filter(fn (array $faq): bool => blank($this->search) || str_contains(strtolower($faq['question'].' '.$faq['answer']), strtolower($this->search)));

        return view('livewire.support-center', compact('faqs'));
    }
}
