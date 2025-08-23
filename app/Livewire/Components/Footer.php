<?php

namespace App\Livewire\Components;

use App\Models\Newsletter;
use Livewire\Component;

class Footer extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|unique:newsletter_users,email',
    ];

    public function createNewsletter()
    {
        $this->validate();

        try {
            Newsletter::create([
                'email' => $this->email,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Error sending email: ' . $e->getMessage());
            return;
        }

        session()->flash('success', 'You have successfully subscribed to the newsletter!');
        $this->reset('email'); // Reset the email input
    }

    public function render()
    {
        return view('livewire.components.footer');
    }
}
