<section class="relative z-10 px-6 md:px-12 py-28" id="tools">

    {{-- Section Header --}}
    <div class="reveal flex items-center gap-6 mb-16 max-w-7xl mx-auto">
        <span class="font-mono text-[11px] text-accent tracking-[0.15em]">02</span>
        <div class="w-14 h-px bg-accent opacity-40"></div>
        <h2 class="text-[clamp(36px,5vw,64px)] font-extrabold tracking-[-0.03em] leading-none">Tools</h2>
    </div>

    <div class="reveal max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

        @foreach($categories as $categoryName => $tools)
            <div>
                <div class="font-mono text-[10px] tracking-[0.2em] uppercase text-accent mb-6 pb-3"
                     style="border-bottom: 1px solid rgba(0,245,160,0.2);">
                    {{ $categoryName }}
                </div>

                <div class="flex flex-col gap-1">
                    @foreach($tools as $tool)
                        <div class="tool-item flex items-center justify-between px-4 py-3 border border-transparent hover:border-white/5 hover:bg-white/[0.02]"
                             data-level="{{ $tool['percent'] }}">
                            <span class="text-[15px] font-semibold">{{ $tool['name'] }}</span>
                            <span class="font-mono text-[10px] tracking-widest text-muted">{{ $tool['level'] }}</span>

                            {{-- Animated bottom bar --}}
                            <div class="tool-bar absolute bottom-0 left-0 h-px transition-all duration-700 ease-out"
                                 style="background: linear-gradient(to right, var(--accent), transparent); width: 0;"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</section>
