<?php

namespace App\Jobs;

use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactJob implements ShouldQueue
{
    use Queueable;

    protected $validatedData;
    /**
     * Create a new job instance.
     */
    public function __construct($validatedData)
    {
        //
        $this->validatedData = $validatedData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $recipient = $this->validatedData['email'];

    Mail::to($recipient)->send(new ContactUsMail($this->validatedData));
    }
}
