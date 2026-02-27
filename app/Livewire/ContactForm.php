<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Mail\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Throwable;

final class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public bool $submitted = false;

    public bool $error = false;

    public string $errorMessage = '';

    public function updated(string $field): void
    {
        $this->validateOnly($field);
    }

    public function submit(): void
    {
        $key = 'contact-form:'.request()->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->error = true;
            $this->errorMessage = 'Too many attempts. Please try again in a minute.';

            return;
        }
        RateLimiter::hit($key, 60);

        $this->validate();

        try {
            Mail::to(config('mail.from.address'))->send(new ContactMessage([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message,
            ]));

            Log::info('Portfolio contact form submission', [
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
            ]);

            $this->reset(['name', 'email', 'subject', 'message']);
            $this->submitted = true;

        } catch (Throwable $e) {
            Log::error('Contact form error: '.$e->getMessage());
            $this->error = true;
            $this->errorMessage = 'Something went wrong. Please try again or email me directly.';
        }
    }

    public function resetForm(): void
    {
        $this->submitted = false;
        $this->error = false;
        $this->errorMessage = '';
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please select a subject.',
            'message.required' => 'Please write a message.',
        ];
    }
}
