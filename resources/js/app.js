import Alpine from 'alpinejs';
import { initAtomicCursor } from './atomic-cursor.js';
import { initNeonUniverse } from './neon-universe.js';

// Neon universe — background particle network (site-wide)
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNeonUniverse, { once: true });
} else {
    initNeonUniverse();
}

// Atomic / ionic custom cursor — runs site-wide
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAtomicCursor, { once: true });
} else {
    initAtomicCursor();
}

// Scroll reveal animations
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-reveal]').forEach(el => {
        observer.observe(el);
    });

    // Smooth scroll for in-page anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            // Skip empty / placeholder anchors like href="#"
            if (!href || href === '#') return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Active section highlight in navbar
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    const highlightNav = () => {
        const scrollY = window.scrollY;
        sections.forEach(section => {
            const top = section.offsetTop - 100;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');
            if (scrollY >= top && scrollY < top + height) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    };

    window.addEventListener('scroll', highlightNav);
});

window.Alpine = Alpine;
Alpine.start();
