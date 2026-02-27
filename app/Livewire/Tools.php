<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class Tools extends Component
{
    /** @var array<string, array<int, array{name: string, level: string, percent: int}>> */
    public array $categories = [
        'Languages' => [
            ['name' => 'PHP', 'level' => 'Expert', 'percent' => 100],
            ['name' => 'Tailwind CSS', 'level' => 'Expert', 'percent' => 95],
            ['name' => 'JavaScript', 'level' => 'Expert', 'percent' => 95],
        ],
        'Frameworks' => [
            ['name' => 'Laravel', 'level' => 'Expert', 'percent' => 100],
            ['name' => 'Meteor', 'level' => 'Expert', 'percent' => 95],
            ['name' => 'Node.js', 'level' => 'Expert', 'percent' => 95],
            ['name' => 'Livewire', 'level' => 'Proficient', 'percent' => 90],
        ],
        'Databases' => [
            ['name' => 'MySQL', 'level' => 'Expert', 'percent' => 90],
            ['name' => 'MongoDB', 'level' => 'Expert', 'percent' => 95],
            ['name' => 'Redis', 'level' => 'Proficient', 'percent' => 85],
        ],
        'Infrastructure' => [
            ['name' => 'Git', 'level' => 'Expert', 'percent' => 95],
            ['name' => 'GitHub Actions', 'level' => 'Proficient', 'percent' => 88],
            ['name' => 'Google Cloud', 'level' => 'Proficient', 'percent' => 78],
            ['name' => 'Docker', 'level' => 'Medium', 'percent' => 70],
        ],
    ];

    public function render(): View
    {
        return view('livewire.tools');
    }
}
