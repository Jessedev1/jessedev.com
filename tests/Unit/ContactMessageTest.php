<?php

declare(strict_types=1);

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Config;

beforeEach(function (): void {
    Config::set('mail.from.address', 'portfolio@example.com');
});

it('builds envelope with subject and reply-to from data', function (): void {
    $data = [
        'name' => 'Jesse',
        'email' => 'jesse@example.com',
        'subject' => 'Collaboration',
        'message' => 'Hello',
    ];

    $mailable = new ContactMessage($data);
    $envelope = $mailable->envelope();

    expect($envelope->subject)->toBe('Contact inzending: Collaboration');

    $replyToAddresses = array_map(
        fn (object $item): string => $item->address ?? (string) $item,
        $envelope->replyTo
    );
    expect($replyToAddresses)->toContain('jesse@example.com');
});

it('uses markdown view for content', function (): void {
    $mailable = new ContactMessage([
        'name' => 'Jesse',
        'email' => 'jesse@example.com',
        'subject' => 'Test',
        'message' => 'Hi',
    ]);

    $content = $mailable->content();

    expect($content->markdown)->toBe('emails.contact-message');
});

it('has no attachments', function (): void {
    $mailable = new ContactMessage([
        'name' => 'Jesse',
        'email' => 'jesse@example.com',
        'subject' => 'Test',
        'message' => 'Hi',
    ]);

    expect($mailable->attachments())->toBeArray()->toBeEmpty();
});
