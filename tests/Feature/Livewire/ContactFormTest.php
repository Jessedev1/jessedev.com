<?php

declare(strict_types=1);

use App\Livewire\ContactForm;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

beforeEach(function (): void {
    Mail::fake();
});

it('validates required fields', function (): void {
    Livewire::test(ContactForm::class)
        ->set('name', '')
        ->set('email', '')
        ->set('subject', '')
        ->set('message', '')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'subject', 'message']);
});

it('validates email format', function (): void {
    Livewire::test(ContactForm::class)
        ->set('name', 'Jesse')
        ->set('email', 'invalid-email')
        ->set('subject', 'Test')
        ->set('message', 'Hello')
        ->call('submit')
        ->assertHasErrors(['email']);
});

it('validates name min length', function (): void {
    Livewire::test(ContactForm::class)
        ->set('name', 'J')
        ->set('email', 'jesse@example.com')
        ->set('subject', 'Test')
        ->set('message', 'Hello')
        ->call('submit')
        ->assertHasErrors(['name']);
});

it('sends mail and shows success on valid submit', function (): void {
    Livewire::test(ContactForm::class)
        ->set('name', 'Jesse Dev')
        ->set('email', 'jesse@example.com')
        ->set('subject', 'Collaboration')
        ->set('message', 'Hi, I would like to work together.')
        ->call('submit')
        ->assertSet('submitted', true)
        ->assertHasNoErrors();

    Mail::assertSent(ContactMessage::class);
});

it('shows rate limit error after too many attempts', function (): void {
    $validData = fn () => [
        ['name', 'Jesse Dev'],
        ['email', 'jesse@example.com'],
        ['subject', 'Collaboration'],
        ['message', 'Hi there'],
    ];

    $component = Livewire::test(ContactForm::class);
    foreach ($validData() as [$key, $value]) {
        $component->set($key, $value);
    }
    $component->call('submit')->assertSet('submitted', true);
    $component->call('resetForm');

    foreach (range(1, 2) as $_) {
        foreach ($validData() as [$key, $value]) {
            $component->set($key, $value);
        }
        $component->call('submit')->assertSet('submitted', true);
        $component->call('resetForm');
    }

    foreach ($validData() as [$key, $value]) {
        $component->set($key, $value);
    }
    $component->call('submit')
        ->assertSet('error', true)
        ->assertSet('errorMessage', 'Too many attempts. Please try again in a minute.');
});

it('resets form state when resetForm is called', function (): void {
    Livewire::test(ContactForm::class)
        ->set('submitted', true)
        ->set('error', true)
        ->set('errorMessage', 'Something')
        ->call('resetForm')
        ->assertSet('submitted', false)
        ->assertSet('error', false)
        ->assertSet('errorMessage', '');
});
