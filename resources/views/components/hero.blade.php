<section class="relative min-h-screen flex flex-col justify-center px-6 md:px-12 pt-28 pb-20 overflow-hidden" id="home">

    {{-- Orbs --}}
    <div class="absolute top-[-100px] right-[-100px] w-[600px] h-[600px] pointer-events-none rounded-full"
         style="background: radial-gradient(circle, rgba(0,245,160,0.08) 0%, transparent 70%); animation: orbDrift 8s ease-in-out infinite alternate;"></div>
    <div class="absolute bottom-0 left-[200px] w-[400px] h-[400px] pointer-events-none rounded-full"
         style="background: radial-gradient(circle, rgba(123,97,255,0.10) 0%, transparent 70%); animation: orbDrift 10s ease-in-out infinite alternate-reverse;"></div>

    <div class="relative z-10 max-w-[88rem] mx-auto w-full flex flex-col md:flex-row md:items-center md:gap-12 lg:gap-16">

        {{-- LEFT: Title & CTA --}}
        <div class="min-w-0 flex-1 max-w-4xl"
            x-data="{
                words: ['Apps', 'Websites', 'Experiences', 'Libraries', 'Packages', 'Solutions'],
                wordIndex: 0,
                text: '',
                charIndex: 0,
                phase: 'typing',
                typingSpeed: 80,
                holdDuration: 2000,
                deleteSpeed: 40,
                timeout: null,
                init() {
                    this.tick();
                },
                tick() {
                    const word = this.words[this.wordIndex];
                    if (this.phase === 'typing') {
                        if (this.charIndex < word.length) {
                            this.text = word.slice(0, this.charIndex + 1);
                            this.charIndex++;
                            this.timeout = setTimeout(() => this.tick(), this.typingSpeed);
                        } else {
                            this.phase = 'holding';
                            this.timeout = setTimeout(() => this.tick(), this.holdDuration);
                        }
                    } else if (this.phase === 'holding') {
                        this.phase = 'deleting';
                        this.tick();
                    } else if (this.phase === 'deleting') {
                        if (this.charIndex > 0) {
                            this.charIndex--;
                            this.text = word.slice(0, this.charIndex);
                            this.timeout = setTimeout(() => this.tick(), this.deleteSpeed);
                        } else {
                            this.wordIndex = (this.wordIndex + 1) % this.words.length;
                            this.phase = 'typing';
                            this.timeout = setTimeout(() => this.tick(), this.typingSpeed);
                        }
                    }
                }
            }"
        >
            <p class="hero-animate-1 font-mono text-[12px] text-accent tracking-[0.2em] uppercase mb-6">
                Full Stack Developer
            </p>

            <h1 class="hero-animate-2 text-[clamp(64px,10vw,140px)] font-extrabold leading-none tracking-[-0.03em] mb-8">
                Building<br>
                <span style="-webkit-text-stroke: 1px rgba(255,255,255,0.3); color: transparent;">Digital</span><br>
                <span class="text-accent inline-block min-w-[0.25em]">
                    <span x-text="text"></span><span class="text-accent animate-pulse inline-block min-w-[0.25em] text-center" aria-hidden="true">|</span>
                </span>
            </h1>

            <p class="hero-animate-3 max-w-2xl text-[18px] text-muted leading-[1.7] mb-12">
				I'm a Full-stack developer from The Netherlands, building digital apps and websites with 9+ years of experience.
				Obsessed with clean code, great UX, and software that actually fits the people using it.
            </p>

            <div class="hero-animate-4 flex flex-wrap gap-4">
                <a href="#projects"
                   class="btn-skew px-8 py-3.5 bg-accent text-black font-bold text-[14px] tracking-widest uppercase transition-all hover:-translate-y-0.5 hover:bg-white hover:shadow-[0_20px_40px_rgba(0,245,160,0.3)]">
                    View Work
                </a>
                <a href="#contact"
                   class="btn-skew px-8 py-3.5 bg-transparent text-white font-bold text-[14px] tracking-widest uppercase border border-white/10 transition-all hover:border-accent hover:text-accent">
                    Get in Touch
                </a>
            </div>
        </div>

        {{-- RIGHT: Laptop (gradient blur spot behind, float, hidden on mobile) --}}
        <div class="hidden lg:flex lg:justify-end pointer-events-none">
            <div class="relative flex items-center justify-center">
                <div class="laptop-spot absolute w-[120%] h-[120%] -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" aria-hidden="true"></div>
                <img src="{{ asset('images/laptop.svg') }}" alt="Laptop" class="relative z-10 float-animate w-lg h-auto" width="208" height="auto" />
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="hero-animate-5 absolute bottom-12 left-12 hidden md:flex items-center gap-3"
         style="writing-mode: vertical-rl;">
        <div class="w-px h-16 scroll-line"
             style="background: linear-gradient(to bottom, var(--accent), transparent);"></div>
        <span class="font-mono text-[11px] tracking-[0.15em] uppercase text-muted">Scroll</span>
    </div>

</section>
