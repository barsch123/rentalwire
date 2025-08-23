<?php

namespace App\Jobs;

use App\Mail\SendNewsletter;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessNewsletter implements ShouldQueue
{
    use Batchable, Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    protected $emails;

    /**
     * Create a new job instance.
     *
     * @param array $emails
     * @return void
     */
    public function __construct(array $emails)
    {
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->emails as $email) {
            Mail::to($email)->send(new SendNewsletter($email));
            Log::info("Newsletter sent to: " . $email);
        }
    }

    /**
     * Handle a failed job.
     *
     * @return void
     */
    public function failed()
    {
        foreach ($this->emails as $email) {
            Log::error("Newsletter job failed for email: " . $email);
        }
    }
}
