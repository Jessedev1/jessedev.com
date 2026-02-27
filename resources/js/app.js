// Alpine is started by Livewire — do not start a second instance (would break $wire in components).

function whenIdle(cb) {
    if ('requestIdleCallback' in window) {
        requestIdleCallback(cb, { timeout: 2000 });
    } else {
        setTimeout(cb, 1);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    whenIdle(() => initCursor());
    whenIdle(() => initScrollReveal());
    whenIdle(() => initActiveNav());
});

function initCursor() {
    if (!window.matchMedia('(pointer: fine)').matches) return;
    const cursor = document.getElementById('cursor');
    const ring = document.getElementById('cursorRing');
    if (!cursor || !ring) return;

    let mx = 0;
    let my = 0;
    let rx = 0;
    let ry = 0;
    let hovered = false;

    const applyCursorTransform = () => {
        const scale = hovered ? ' scale(2)' : '';
        cursor.style.transform = `translate(${mx - 6}px, ${my - 6}px)${scale}`;
    };

    document.addEventListener('mousemove', (e) => {
        mx = e.clientX;
        my = e.clientY;
        applyCursorTransform();
    });

    function animateRing() {
        rx += (mx - rx) * 0.12;
        ry += (my - ry) * 0.12;
        ring.style.transform = `translate(${rx - 18}px, ${ry - 18}px)`;
        requestAnimationFrame(animateRing);
    }
    animateRing();

    whenIdle(() => {
        document.querySelectorAll('a, button, .project-card, .tool-item').forEach((el) => {
            el.addEventListener('mouseenter', () => {
                hovered = true;
                applyCursorTransform();
            });
            el.addEventListener('mouseleave', () => {
                hovered = false;
                applyCursorTransform();
            });
        });
    });
}

let revealObserver = null;

function initScrollReveal() {
    revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((e) => {
                if (!e.isIntersecting) return;
                e.target.classList.add('visible');

                whenIdle(() => {
                    e.target.querySelectorAll('[data-level]').forEach((item) => {
                        const level = item.dataset.level || 80;
                        const bar = item.querySelector('.tool-bar');
                        if (bar) setTimeout(() => (bar.style.width = level + '%'), 300);
                    });
                });

                whenIdle(() => {
                    e.target.querySelectorAll('[data-count]').forEach((el) => {
                        const target = parseInt(el.dataset.count, 10);
                        let current = 0;
                        const step = target / 40;
                        const timer = setInterval(() => {
                            current = Math.min(current + step, target);
                            el.textContent =
                                Math.floor(current) + (target >= 1000 ? '' : '+');
                            if (current >= target) {
                                clearInterval(timer);
                                el.textContent =
                                    target >= 1000 ? target.toLocaleString() : target + '+';
                            }
                        }, 30);
                    });
                });
            });
        },
        { threshold: 0.15 }
    );

    observeRevealsIn(document.body);
}

function observeRevealsIn(root) {
    if (!revealObserver) return;
    const rootEl = root instanceof Document ? root.body : root;
    if (!rootEl || !rootEl.querySelectorAll) return;
    rootEl.querySelectorAll('.reveal').forEach((el) => {
        revealObserver.observe(el);
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.85) {
            el.classList.add('visible');
        }
    });
}

document.addEventListener('livewire:navigated', () => {
    if (revealObserver) observeRevealsIn(document.body);
});

document.addEventListener('livewire:initialized', () => {
    window.Livewire.hook('request', ({ succeed }) => {
        succeed(() => {
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    if (revealObserver) {
                        observeRevealsIn(document.body);
                        const contact = document.getElementById('contact');
                        if (contact) {
                            contact.querySelectorAll('.reveal').forEach((el) => el.classList.add('visible'));
                        }
                    }
                });
            });
        });
    });
});

function initActiveNav() {
    const sections = document.querySelectorAll('section[id]');
    if (!sections.length) return;

    let ticking = false;
    window.addEventListener(
        'scroll',
        () => {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(() => {
                sections.forEach((sec) => {
                    const top = sec.offsetTop - 100;
                    const id = sec.getAttribute('id');
                    if (window.scrollY >= top) {
                        document.querySelectorAll('.nav-link').forEach((a) => {
                            const active = a.getAttribute('href') === '#' + id;
                            a.classList.toggle('text-white', active);
                            a.classList.toggle('text-muted', !active);
                        });
                    }
                });
                ticking = false;
            });
        },
        { passive: true }
    );
}
