<section class="relative z-10 px-6 md:px-12 py-28 border-t border-b border-white/5 bg-surface" id="about">

    {{-- Section Header --}}
    <div class="reveal flex items-center gap-6 mb-16 max-w-7xl mx-auto">
        <span class="font-mono text-[11px] text-accent tracking-[0.15em]">03</span>
        <div class="w-14 h-px bg-accent opacity-40"></div>
        <h2 class="text-[clamp(36px,5vw,64px)] font-extrabold tracking-[-0.03em] leading-none">About Me</h2>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20 items-center">

        {{-- Text --}}
        <div class="reveal space-y-5 text-[17px] text-muted leading-[1.8]">
            <p>
                Hey! My name is <span class="text-white font-semibold">Jesse</span>, <span class="wave">👋</span><br>
                I'm a <span class="text-white">full-stack developer</span> based in <span class="text-white">The Netherlands</span>.
                I've been building software for <span class="text-white">9+ years</span>, with a deep love for
                code quality, user experience and performance. I'm a big fan of clean code and easy-to-use interfaces.
            </p>
            <p>
                By day I'm a Software Developer at <a href="https://www.codewow.nl/" target="_blank" class="text-accent border-b border-accent hover:text-white hover:border-white">Code WOW!</a>,
				where I'm building software to make the lives of the end-users easier.

				I've been working on a variety of projects, like Warehouse Management Systems, Custom CRM systems, Quotation systems, and many more. All perfectly tailored to the needs of the client.
				This way the systems are shaped around the customer, so the customer doesn't have to shape their business to the system.
            </p>
            <p>
                After finishing my Bachelor's degree in 2025, I've been working on a lot of projects.
				Some of my projects are open-source, like the Laravel Guardian package, the PlateCheck app, and the Filament Exact library.
				You can find them on my <a href="https://github.com/Jessedev1" target="_blank">GitHub profile</a>.
            </p>
			<p>
                When the laptop closes: <span class="text-white">gym sessions</span>,
                <span class="text-white">video games</span>, and chasing empty back roads behind the wheel of my car, listening to some good music.
            </p>
        </div>

        <div class="reveal reveal-delay-1 flex flex-col gap-10">
            <div class="about-photo-wrap relative w-full max-w-sm mx-auto lg:mr-0 lg:ml-auto">
                <div class="about-photo-glow absolute -inset-8 rounded-xl pointer-events-none"></div>
				<div class="relative overflow-hidden rounded-md">
					<picture>
						<source srcset="{{ asset('images/me.webp') }}" type="image/webp">
						<img src="{{ asset('images/me.jpg') }}" alt="Jesse de Vries" class="about-photo" width="364" height="364" loading="lazy">
					</picture>
				</div>
            </div>
            <div class="grid grid-cols-2 gap-0.5">
            @foreach([
                ['count' => 9,    'label' => 'Years Coding'],
                ['count' => 80,   'label' => 'Projects Shipped'],
            ] as $stat)
                <div class="stat-box relative bg-[#050508] border border-white/5 p-8 overflow-hidden">
                    <div
                        class="text-[52px] font-extrabold leading-none tracking-[-0.04em] mb-2 text-accent"
                        data-count="{{ $stat['count'] }}"
                    >
                        0
                    </div>
                    <div class="text-[12px] font-semibold tracking-widest uppercase text-muted">
                        {{ $stat['label'] }}
                    </div>
                </div>
            @endforeach
            </div>
        </div>

    </div>

</section>
