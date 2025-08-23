<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\ContactJob;
use Illuminate\Support\Facades\Log;
class ContactForm extends Component
{
    public $name, $email, $message, $contact, $contactMethod, $date;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'message' => 'required|min:10|max:255',
        'contact' => 'required|string',
        'contactMethod' => 'required|string',
        'date' => 'required|date',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        try {
            ContactJob::dispatch($validatedData);
            session()->flash('message', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            Log::info('Error: ' . $e->getMessage());
            // session()->flash('error', 'Error sending email: ' . $e->getMessage());
            // return;
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contactForm');
    }
}
