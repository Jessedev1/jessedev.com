<div class="overflow-hidden border-t border-b border-white/5 py-3" style="background: rgba(0,245,160,0.02);">
    <div class="ticker-track flex gap-0">
        @php
            $items = ['Tailwind CSS','Alpine.js','Laravel','Livewire','FilamentPHP','Node.JS','Meteor','WordPress','MySQL','MongoDB','Redis','Git','Google Cloud' ];
            $all = array_merge($items, $items); // Duplicate for seamless loop
        @endphp
        @foreach($all as $item)
            <span class="flex items-center gap-4 px-10 font-mono text-[11px] tracking-[0.15em] uppercase text-muted whitespace-nowrap">
                <span class="w-1 h-1 rounded-full bg-accent flex-shrink-0"></span>
                {{ $item }}
            </span>
        @endforeach
    </div>
</div>
