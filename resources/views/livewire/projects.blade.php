<section class="relative z-10 px-6 md:px-12 py-28 border-t border-b border-white/5" id="projects"
         style="background-color: #0d0d14;">

    {{-- Section Header --}}
    <div class="reveal flex items-center gap-6 mb-16 max-w-7xl mx-auto">
        <span class="font-mono text-[11px] text-accent tracking-[0.15em]">01</span>
        <div class="w-14 h-px bg-accent opacity-40"></div>
        <h2 class="text-[clamp(36px,5vw,64px)] font-extrabold tracking-[-0.03em] leading-none">Projects</h2>
    </div>

    {{-- Projects Grid --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-0.5" wire:loading.class="opacity-60">

        @foreach($projects as $index => $project)
            <div
                class="project-card bg-[#050508] border border-white/5 p-10 relative overflow-hidden
                    {{ $project['featured'] ? 'md:col-span-2' : '' }}
                    reveal reveal-delay-{{ min($index + 1, 3) }}"
            >
                {{-- Hover gradient --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"
                     style="background: linear-gradient(135deg, rgba(0,245,160,0.05) 0%, transparent 60%);"></div>

                {{-- Stars badge --}}
                @if($project['stars'])
                    <div class="absolute top-10 right-10 flex items-center gap-1 font-mono text-[11px] text-muted">
                        ★ {{ $project['stars'] }}
                    </div>
                @endif

                <span class="block font-mono text-[11px] text-accent mb-5 tracking-widest">
                    {{ $project['num'] }}
                </span>

                <h3 class="text-2xl font-bold tracking-tight mb-3">{{ $project['name'] }}</h3>
                <p class="text-[14px] text-muted leading-[1.7] mb-7">{{ $project['description'] }}</p>

                {{-- Tags --}}
                <div class="flex flex-wrap gap-2 mb-7">
                    @foreach($project['tags'] as $tag)
                        <span class="px-3 py-1 text-[10px] font-mono tracking-widest uppercase border border-white/5 text-muted"
                              style="background: rgba(255,255,255,0.03);">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>

                {{-- Links --}}
                <div class="flex gap-5">
                    @if($project['github'])
                        <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer"
                           aria-label="View {{ $project['name'] }} on GitHub"
                           class="flex items-center gap-1.5 font-mono text-[11px] tracking-widest uppercase text-accent transition-all hover:gap-3">
                            GitHub →
                        </a>
                    @endif
                    @if($project['demo'])
                        <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer"
                           aria-label="View {{ $project['name'] }} live demo"
                           class="flex items-center gap-1.5 font-mono text-[11px] tracking-widest uppercase text-accent transition-all hover:gap-3">
                            Live Demo →
                        </a>
                    @endif
                    @if(!$project['github'] && !$project['demo'])
                        <span class="font-mono text-[11px] tracking-widest uppercase text-muted">Case Study →</span>
                    @endif
                </div>
            </div>
        @endforeach

        @if(empty($projects))
            <div class="md:col-span-2 py-20 text-center text-muted font-mono text-sm tracking-wider">
                No projects in this category yet.
            </div>
        @endif

    </div>

</section>
