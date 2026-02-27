<?php

declare(strict_types=1);

it('loads home page with critical content', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('Contact', false);
    $response->assertSee('Send Message', false);
});

it('home page contains projects section', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('PlateCheck', false);
});

it('home page contains about or hero content', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('Laravel', false);
});
