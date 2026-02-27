<nav
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-12 py-5 border-b border-white/5 backdrop-blur-xl"
    style="background: rgba(5,5,8,0.85);"
    x-data="{ open: false }"
>
    <div class="font-mono text-[13px] text-accent tracking-widest uppercase">Jesse de Vries</div>

    {{-- Desktop Nav --}}
    <ul class="hidden md:flex gap-10 list-none">
        @foreach([['#projects','Projects'],['#tools','Tools'],['#about','About'],['#contact','Contact']] as [$href, $label])
            <li>
                <a href="{{ $href }}"
                   class="nav-link text-muted text-[13px] font-semibold tracking-widest uppercase transition-colors hover:text-white">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Mobile Menu Toggle --}}
    <button
        @click="open = !open"
        class="md:hidden text-white p-2 focus:outline-none"
        aria-label="Toggle menu"
    >
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- Mobile Dropdown --}}
    <div
        x-show="open"
        x-transition
        class="absolute top-full left-0 right-0 bg-[#0d0d14] border-b border-white/5 py-4 md:hidden"
    >
        @foreach([['#projects','Projects'],['#tools','Tools'],['#about','About'],['#contact','Contact']] as [$href, $label])
            <a href="{{ $href }}"
               @click="open = false"
               class="block px-12 py-3 text-muted text-sm font-semibold tracking-widest uppercase hover:text-white">
                {{ $label }}
            </a>
        @endforeach
    </div>
</nav>
