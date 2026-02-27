<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /** @param array{name: string, email: string, subject: string, message: string} $data */
    public function __construct(
        public array $data
    ) {}

    public function envelope(): Envelope
    {
        $from = config('mail.from.address');

        return new Envelope(
            from: is_string($from) ? $from : null,
            replyTo: [$this->data['email']],
            subject: 'Contact inzending: '.$this->data['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-message',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
