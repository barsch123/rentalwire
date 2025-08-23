<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Jobs\ProcessNewsletter;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use App\Models\Newsletter;

#[Layout('layouts.admin')]

class Settings extends Component
{
    public $email, $status;

    public function sendNewsLetter()
    {
        try {
            $emails = Newsletter::where('status', 'subscribed')->pluck('email');
            if ($emails->isEmpty()) {
                session()->flash('message', 'No subscribers found.');
                return;
            }
            $batch = Bus::batch([
                new ProcessNewsletter($emails->toArray()),
            ])->then(function () {
                Log::info('Newsletter batch completed');
                session()->flash('message', 'Newsletter sent successfully!');
            })->dispatch();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'An error occurred while sending the newsletter.');
        }



       
        //     Log::info('Newsletter batch started');
        // });

        // foreach ($newsletters as $subscriber) {
        //     if (!empty($subscriber->email)) {
        //         $batch->add(new ProcessNewsletter($subscriber->email));
        //     }
        // }

        // $batch->dispatch();

    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
