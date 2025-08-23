<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\JobApplication;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CareerForm extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $position, $resume, $coverLetter;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'position' => 'required|string|max:255',
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'coverLetter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        $resumePath = $this->resume?->store('resumes', 'public');
        $coverLetterPath = $this->coverLetter?->store('coverletters', 'public');
        
      //debug
        if ($coverLetterPath) {
            Log::info('Cover Letter stored:', [
                'path' => $coverLetterPath,
                'name' => $this->coverLetter->getClientOriginalName(),
                'mime' => $this->coverLetter->getClientMimeType(),
            ]);
        }

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
        ];
        JobApplication::dispatch($data, $resumePath, $coverLetterPath);
        session()->flash('message', 'Your application has been submitted successfully.');
        $this->reset(['name', 'email', 'phone', 'position', 'resume', 'coverLetter']);
    }


    public function render()
    {
        return view('livewire.careerForm');
    }
}
