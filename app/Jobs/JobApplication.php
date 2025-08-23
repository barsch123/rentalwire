<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationMail;

class JobApplication implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $resumePath;
    public $coverLetterPath;

    /**
     * Create a new job instance.
     *
     * @param array $data
     * @param string|null $resumePath
     * @param string|null $coverLetterPath
     */
    public function __construct($data, $resumePath = null, $coverLetterPath = null)
    {
        $this->data = $data;
        $this->resumePath = $resumePath;
        $this->coverLetterPath = $coverLetterPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('watsonal918@gmail.com')->send(new JobApplicationMail($this->data, $this->resumePath, $this->coverLetterPath));
    }
}
