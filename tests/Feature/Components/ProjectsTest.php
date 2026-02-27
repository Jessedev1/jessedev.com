<?php

declare(strict_types=1);

use App\Livewire\Projects;
use Livewire\Livewire;

it('renders the projects component', function (): void {
    $component = Livewire::test(Projects::class);

    $component->assertStatus(200);
});

it('displays project names', function (): void {
    $component = Livewire::test(Projects::class);

    $component->assertSee('PlateCheck', false);
    $component->assertSee('Laravel Guardian', false);
    $component->assertSee('Filament Exact', false);
});

it('has at least one featured project', function (): void {
    $component = Livewire::test(Projects::class);

    $projects = $component->get('projects');
    $featured = array_filter($projects, fn (array $p): bool => ($p['featured'] ?? false) === true);

    expect($featured)->not->toBeEmpty();
});
