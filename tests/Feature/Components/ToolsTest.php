<?php

declare(strict_types=1);

use App\Livewire\Tools;
use Livewire\Livewire;

it('renders the tools component', function (): void {
    $component = Livewire::test(Tools::class);

    $component->assertStatus(200);
});

it('displays tool categories', function (): void {
    $component = Livewire::test(Tools::class);

    $component->assertSee('Languages', false);
    $component->assertSee('Frameworks', false);
    $component->assertSee('Databases', false);
    $component->assertSee('Infrastructure', false);
});

it('displays expected tools', function (): void {
    $component = Livewire::test(Tools::class);

    $component->assertSee('Laravel', false);
    $component->assertSee('PHP', false);
    $component->assertSee('Livewire', false);
});
