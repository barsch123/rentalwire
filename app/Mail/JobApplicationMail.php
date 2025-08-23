<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class JobApplicationMail extends Mailable implements ShouldQueue    
{
    use Queueable, SerializesModels;

    public $data;
    public $resumePath;
    public $coverLetterPath;

    /**
     * Create a new message instance.
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
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach Resume
        if ($this->resumePath && Storage::disk('public')->exists($this->resumePath)) {
            $resumePath = Storage::disk('public')->path($this->resumePath);
            $resumeMimeType = mime_content_type($resumePath) ?: 'application/pdf'; // Use PHP's mime_content_type
            $attachments[] = Attachment::fromPath($resumePath)
                ->as(basename($this->resumePath))
                ->withMime($resumeMimeType);
        }

        // Attach Cover Letter
        if ($this->coverLetterPath && Storage::disk('public')->exists($this->coverLetterPath)) {
            $coverLetterPath = Storage::disk('public')->path($this->coverLetterPath);
            $coverLetterMimeType = mime_content_type($coverLetterPath) ?: 'application/pdf';
            Log::info('Attaching Cover Letter:', ['path' => $coverLetterPath, 'mime' => $coverLetterMimeType]);
            $attachments[] = Attachment::fromPath($coverLetterPath)
                ->as(basename($this->coverLetterPath))
                ->withMime($coverLetterMimeType);
        }

        return $attachments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.job-application')
            ->subject('New Job Application')
            ->with('data', $this->data);
    }
}
