<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class Projects extends Component
{
    /** @var list<array{id: int, num: string, name: string, description: string, tags: array<int, string>, github: string, demo: string|null, stars: int|null, featured: bool}> */
    public array $projects = [
        [
            'id' => 1,
            'num' => '★ FEATURED',
            'name' => 'PlateCheck',
            'description' => 'PlateCheck is a mobile app for searching vehicle information. It allows you to search for a vehicle by its plate number and get information about the vehicle. The app was built with Vue.js and Tailwind CSS and was linked to a custom multi-threaded API written in Node.js and MongoDB. The API aggregates data from multiple APIs to get the information about the vehicle and combined it into a single response.',
            'tags' => ['Vue.js', 'Tailwind CSS', 'Node.js', 'MongoDB', 'API', 'Concurrency'],
            'github' => 'https://github.com/platecheck',
            'demo' => 'https://platecheck.nl/',
            'stars' => 0,
            'featured' => true,
        ],
        [
            'id' => 2,
            'num' => '02',
            'name' => 'Laravel Guardian',
            'description' => 'Laravel package for monitoring and alerting your application. It allows you to monitor your application and get alerts when something is wrong. The package is built with Laravel and is a great way to keep your application running smoothly.',
            'tags' => ['Laravel'],
            'github' => 'https://github.com/Jessedev1/laravel-guardian',
            'demo' => null,
            'stars' => 0,
            'featured' => false,
        ],
        [
            'id' => 3,
            'num' => '03',
            'name' => 'Meteor 3 packages',
            'description' => 'As of Meteor 3, I have updated several unmaintained packages to ensure compatibility with the latest Meteor version. These packages include: tap-18n, gound-db, meteor-persistent-session, meteor-postcss, bert, cleaner, meteor-ssr, meteor-synced-cron. Each package has been thoroughly tested and is now fully compatible with Meteor 3, providing a seamless user experience for authentication and user interface components.',
            'tags' => ['MeteorJS', 'Node.js'],
            'github' => 'https://github.com/Jessedev1',
            'demo' => null,
            'stars' => null,
            'featured' => false,
        ],
        [
            'id' => 4,
            'num' => '04',
            'name' => 'Filament Exact',
            'description' => 'An open-source library that provides a seamless integration between FilamentPHP and the Exact Online API. It simplifies the process of connecting your FilamentPHP panel to Exact Online, allowing you to easily manage and interact with your Exact Online data within your FilamentPHP application. Filament Exact provides a built-in queue to handle API limits and ensures smooth data synchronization between your application and Exact Online.',
            'tags' => ['Laravel', 'FilamentPHP', 'Exact Online'],
            'github' => 'https://github.com/codewownl/filament-exact',
            'demo' => null,
            'stars' => 0,
            'featured' => false,
        ],
		[
            'id' => 5,
            'num' => '05',
            'name' => 'WOW - Workflow Orchestration Wizard',
            'description' => 'This cli-tool allows developers to start multiple processes (like "npm run dev", "php artisan queue:listen", etc.) in a row, with one simple command.',
            'tags' => ['Rust', 'CLI', 'Workflow', 'Orchestration'],
            'github' => 'https://github.com/Jessedev1/wow',
            'demo' => null,
            'stars' => 0,
            'featured' => false,
        ],
        [
            'id' => 6,
            'num' => '06',
            'name' => 'Jessedev.com - Portfolio website',
            'description' => 'This website is a portfolio of my projects and skills. It is built with Laravel, Livewire, Tailwind CSS and Alpine.js.',
            'tags' => ['Laravel', 'Livewire', 'Tailwind CSS', 'Alpine.js', 'Vite'],
            'github' => 'https://github.com/Jessedev1/jessedev.com',
            'demo' => 'https://jessedev.com/',
            'stars' => 0,
            'featured' => false,
        ],
    ];

    public function render(): View
    {
        return view('livewire.projects', [
            'projects' => $this->projects,
        ]);
    }
}
