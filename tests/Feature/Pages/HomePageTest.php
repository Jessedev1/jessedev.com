<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

it('resolves the home route successfully', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
});

it('home page contains main sections', function (): void {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('Contact', false);
    $response->assertSee('Projects', false);
    $response->assertSee('Tools', false);
});

it('home route is registered', function (): void {
    expect(Route::has('home'))->toBeTrue();
});
