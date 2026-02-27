<x-layouts.app>

    {{-- Hero --}}
    <x-hero />

    {{-- Scrolling tech ticker --}}
    <x-ticker />

    {{-- Projects (Livewire — filterable) --}}
    @livewire('projects')

    {{-- Tools (Livewire — scroll-animated) --}}
    @livewire('tools')

    {{-- About --}}
    <x-about />

    {{-- Contact Form (Livewire — real-time validation) --}}
    @livewire('contact-form')

</x-layouts.app>
