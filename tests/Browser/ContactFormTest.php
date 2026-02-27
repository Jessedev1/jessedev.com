<?php

declare(strict_types=1);

use App\Livewire\ContactForm;
use Livewire\Livewire;

it('shows contact form with all fields and submit button', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('Contact', false);
    $response->assertSee('Send Message', false);
    $response->assertSee('Name', false);
    $response->assertSee('Email', false);
    $response->assertSee('Subject', false);
    $response->assertSee('Message', false);
});

it('contact form has accessible input ids', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('id="name"', false);
    $response->assertSee('id="email"', false);
    $response->assertSee('id="subject"', false);
    $response->assertSee('id="message"', false);
});

it('shows success state after valid form submit', function (): void {
    $this->get(route('home'));

    $component = Livewire::test(ContactForm::class)
        ->set('name', 'Browser Tester')
        ->set('email', 'browser@example.com')
        ->set('subject', 'Test')
        ->set('message', 'Message from browser test.')
        ->call('submit');

    $component->assertSet('submitted', true);
    $component->assertSee('Message Sent!');
    $component->assertSee('Send Another');
});
