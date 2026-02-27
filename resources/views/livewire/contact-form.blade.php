<section class="relative z-10 px-6 md:px-12 py-28" id="contact">

    {{-- Section Header --}}
    <div class="reveal flex items-center gap-6 mb-16 max-w-7xl mx-auto">
        <span class="font-mono text-[11px] text-accent tracking-[0.15em]">04</span>
        <div class="w-14 h-px bg-accent opacity-40"></div>
        <h2 class="text-[clamp(36px,5vw,64px)] font-extrabold tracking-[-0.03em] leading-none">Contact</h2>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20 items-start">

        {{-- Left: Info --}}
        <div class="reveal">
            <h3 class="text-xl font-semibold mb-4">Let's build something together.</h3>
            <p class="text-muted text-[15px] leading-[1.8] mb-10">
                Whether you have a project in mind, want to collaborate on open-source, or just want to say hi: my inbox is always open. I'll do my best to get back to you as soon as possible. Looking forward to connecting!
            </p>

            <div class="flex flex-col gap-3">
                @php
                    $contactLinks = [
                        ['label' => 'EMAIL',    'text' => 'info@jessedev.com',   'href' => 'mailto:info@jessedev.com'],
                        ['label' => 'GITHUB',   'text' => 'Jessedev1',   'href' => 'https://github.com/Jessedev1'],
                        ['label' => 'LINKEDIN', 'text' => 'Jessedev', 'href' => 'https://www.linkedin.com/in/jessedev/'],
                    ];
                @endphp
                @foreach($contactLinks as $link)
                    <a href="{{ $link['href'] }}" target="_blank"
                       class="flex items-center gap-4 px-4 py-4 border border-white/5 text-white text-[14px] font-semibold
                              transition-all hover:border-accent hover:text-accent hover:pl-6">
                        <span class="font-mono text-[10px] tracking-widest text-accent min-w-[64px]">{{ $link['label'] }}</span>
                        {{ $link['text'] }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Right: Form --}}
        <div class="reveal reveal-delay-2">

            {{-- Success State --}}
            @if($submitted)
                <div class="flex flex-col items-center justify-center py-20 text-center gap-6"
                     x-data x-init="$el.scrollIntoView({ behavior: 'smooth', block: 'center' })">
                    <div class="text-6xl font-extrabold text-accent">✓</div>
                    <h4 class="text-2xl font-bold">Message Sent!</h4>
                    <p class="text-muted text-[15px]">Thanks for reaching out. I'll get back to you as soon as possible.</p>
                    <button wire:click="resetForm"
                            class="btn-skew px-6 py-3 bg-transparent border border-white/10 text-muted font-mono text-[11px] tracking-widest uppercase hover:border-accent hover:text-accent transition-all">
                        Send Another →
                    </button>
                </div>

                {{-- Error State --}}
            @elseif($error)
                <div class="mb-6 px-5 py-4 border border-red-500/30 bg-red-500/10 text-red-400 font-mono text-[12px] tracking-wide">
                    ⚠ {{ $errorMessage }}
                </div>
            @endif

            {{-- Form --}}
            @if(!$submitted)
                <form class="flex flex-col gap-5" wire:submit.prevent="submit">
                    {{-- Name + Email Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="font-mono text-[10px] tracking-[0.15em] uppercase text-muted" for="name">Name</label>
                            <input
                                id="name"
                                type="text"
                                wire:model.blur="name"
                                placeholder="Your name"
                                class="bg-white/[0.03] border border-white/5 text-white px-4 py-3.5 text-[14px] outline-none
                                       focus:border-accent focus:bg-accent/[0.03] transition-colors placeholder:text-muted/50"
                            >
                            @error('name')
                            <span class="font-mono text-[10px] text-red-400 tracking-wide">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-mono text-[10px] tracking-[0.15em] uppercase text-muted" for="email">Email</label>
                            <input
                                id="email"
                                type="email"
                                wire:model.blur="email"
                                placeholder="your@email.com"
                                class="bg-white/[0.03] border border-white/5 text-white px-4 py-3.5 text-[14px] outline-none
                                       focus:border-accent focus:bg-accent/[0.03] transition-colors placeholder:text-muted/50"
                            >
                            @error('email')
                            <span class="font-mono text-[10px] text-red-400 tracking-wide">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Subject --}}
                    <div class="flex flex-col gap-2">
                        <label class="font-mono text-[10px] tracking-[0.15em] uppercase text-muted" for="subject">Subject</label>
                        <input
                            id="subject"
                            type="text"
                            wire:model.blur="subject"
							placeholder="Project collaboration, job opportunity, open source, etc."
                            class="bg-white/[0.03] border border-white/5 text-white px-4 py-3.5 text-[14px] outline-none
                                   focus:border-accent focus:bg-accent/[0.03] transition-colors appearance-none"
                        >
                        @error('subject')
                        <span class="font-mono text-[10px] text-red-400 tracking-wide">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div class="flex flex-col gap-2">
                        <label class="font-mono text-[10px] tracking-[0.15em] uppercase text-muted" for="message">Message</label>
                        <textarea
                            id="message"
                            wire:model.blur="message"
                            rows="5"
                            placeholder="Tell me about your project or idea..."
                            class="bg-white/[0.03] border border-white/5 text-white px-4 py-3.5 text-[14px] outline-none
                                   focus:border-accent focus:bg-accent/[0.03] transition-colors resize-y min-h-[140px] placeholder:text-muted/50"
                        ></textarea>
                        @error('message')
                        <span class="font-mono text-[10px] text-red-400 tracking-wide">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="btn-skew flex items-center justify-between px-8 py-4 bg-accent text-black font-bold text-[14px]
                               tracking-widest uppercase transition-all hover:-translate-y-0.5
                               hover:bg-white hover:shadow-[0_20px_60px_rgba(0,245,160,0.3)]"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-70 cursor-wait"
                    >
                        <span wire:loading.class="hidden" wire:target="submit">Send Message</span>
                        <span class="hidden" wire:loading.class.remove="hidden" wire:target="submit">Sending...</span>
                        <span class="text-lg">→</span>
                    </button>

                </form>
            @endif

        </div>
    </div>

</section>
