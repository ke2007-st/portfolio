/**
 * Neon Universe — Particle Network Cursor
 * Custom circular cursor with glowing core that links to floating particles
 * via animated lines, forming a living "universe" backdrop.
 */
export function initNeonUniverse() {
    const canvas = document.getElementById('neon-canvas');
    const cursorCore = document.getElementById('neon-cursor-core');
    const cursorRing = document.getElementById('neon-cursor-ring');

    if (!canvas) return;

    // Disable on touch devices
    if ('ontouchstart' in window || navigator.maxTouchPoints > 0 || window.matchMedia('(pointer: coarse)').matches) {
        return;
    }

    const ctx = canvas.getContext('2d');
    const DPR = Math.min(window.devicePixelRatio || 1, 2);

    let width = 0;
    let height = 0;
    let particles = [];
    const mouse = { x: -1000, y: -1000, vx: 0, vy: 0, active: false };
    let ringX = 0, ringY = 0;

    const CONFIG = {
        particleCount: 90,
        particleMinSize: 0.6,
        particleMaxSize: 2.2,
        linkDistance: 160,        // distance particule <-> particule pour relier
        cursorLinkDistance: 220,  // distance curseur <-> particule pour relier
        cursorSize: 6,
        ringSize: 32,
        speed: 0.25,
        colors: {
            cyan: '0, 240, 255',
            blue: '0, 102, 255',
            violet: '139, 92, 246',
        },
    };

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width * DPR;
        canvas.height = height * DPR;
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(DPR, 0, 0, DPR, 0, 0);

        // Adjust particle count based on viewport
        const target = Math.floor((width * height) / 14000);
        CONFIG.particleCount = Math.min(140, Math.max(40, target));
        initParticles();
    }

    function initParticles() {
        particles = [];
        for (let i = 0; i < CONFIG.particleCount; i++) {
            particles.push(createParticle());
        }
    }

    function createParticle() {
        const colorKeys = ['cyan', 'blue', 'violet'];
        const colorKey = colorKeys[Math.floor(Math.random() * colorKeys.length)];
        return {
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * CONFIG.speed,
            vy: (Math.random() - 0.5) * CONFIG.speed,
            size: CONFIG.particleMinSize + Math.random() * (CONFIG.particleMaxSize - CONFIG.particleMinSize),
            color: CONFIG.colors[colorKey],
            alpha: 0.3 + Math.random() * 0.6,
            twinkle: Math.random() * Math.PI * 2,
            twinkleSpeed: 0.01 + Math.random() * 0.03,
        };
    }

    function updateParticles() {
        particles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            p.twinkle += p.twinkleSpeed;

            // Wrap around edges
            if (p.x < -10) p.x = width + 10;
            if (p.x > width + 10) p.x = -10;
            if (p.y < -10) p.y = height + 10;
            if (p.y > height + 10) p.y = -10;

            // Subtle attraction to cursor when active
            if (mouse.active) {
                const dx = mouse.x - p.x;
                const dy = mouse.y - p.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < CONFIG.cursorLinkDistance && dist > 0) {
                    const force = 0.02 * (1 - dist / CONFIG.cursorLinkDistance);
                    p.vx += (dx / dist) * force;
                    p.vy += (dy / dist) * force;
                }
            }

            // Friction
            p.vx *= 0.985;
            p.vy *= 0.985;

            // Maintain a minimum motion
            const speed = Math.sqrt(p.vx * p.vx + p.vy * p.vy);
            if (speed < 0.05) {
                p.vx += (Math.random() - 0.5) * 0.05;
                p.vy += (Math.random() - 0.5) * 0.05;
            }
        });
    }

    function drawParticle(p) {
        const twinkle = 0.5 + 0.5 * Math.sin(p.twinkle);
        const alpha = p.alpha * (0.5 + twinkle * 0.5);

        // Glow halo
        const gradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.size * 4);
        gradient.addColorStop(0, `rgba(${p.color}, ${alpha})`);
        gradient.addColorStop(1, `rgba(${p.color}, 0)`);
        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size * 4, 0, Math.PI * 2);
        ctx.fill();

        // Core
        ctx.fillStyle = `rgba(${p.color}, ${alpha})`;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fill();
    }

    function drawLinks() {
        for (let i = 0; i < particles.length; i++) {
            const p1 = particles[i];

            // Link to cursor
            if (mouse.active) {
                const dx = mouse.x - p1.x;
                const dy = mouse.y - p1.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < CONFIG.cursorLinkDistance) {
                    const alpha = (1 - dist / CONFIG.cursorLinkDistance) * 0.8;
                    const gradient = ctx.createLinearGradient(p1.x, p1.y, mouse.x, mouse.y);
                    gradient.addColorStop(0, `rgba(${p1.color}, ${alpha * 0.4})`);
                    gradient.addColorStop(1, `rgba(${CONFIG.colors.cyan}, ${alpha})`);
                    ctx.strokeStyle = gradient;
                    ctx.lineWidth = 1.2;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(mouse.x, mouse.y);
                    ctx.stroke();
                }
            }

            // Link to other particles
            for (let j = i + 1; j < particles.length; j++) {
                const p2 = particles[j];
                const dx = p2.x - p1.x;
                const dy = p2.y - p1.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < CONFIG.linkDistance) {
                    const alpha = (1 - dist / CONFIG.linkDistance) * 0.25;
                    ctx.strokeStyle = `rgba(${CONFIG.colors.violet}, ${alpha})`;
                    ctx.lineWidth = 0.6;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.stroke();
                }
            }
        }
    }

    function drawCursorCore() {
        if (!mouse.active) return;

        // Inner glowing core on canvas
        const gradient = ctx.createRadialGradient(mouse.x, mouse.y, 0, mouse.x, mouse.y, CONFIG.cursorSize * 4);
        gradient.addColorStop(0, `rgba(${CONFIG.colors.cyan}, 0.9)`);
        gradient.addColorStop(0.4, `rgba(${CONFIG.colors.cyan}, 0.3)`);
        gradient.addColorStop(1, `rgba(${CONFIG.colors.cyan}, 0)`);
        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.arc(mouse.x, mouse.y, CONFIG.cursorSize * 4, 0, Math.PI * 2);
        ctx.fill();
    }

    function animate() {
        ctx.clearRect(0, 0, width, height);
        updateParticles();
        drawLinks();
        particles.forEach(drawParticle);
        drawCursorCore();

        // Smooth ring follow
        ringX += (mouse.x - ringX) * 0.18;
        ringY += (mouse.y - ringY) * 0.18;
        if (cursorRing) {
            cursorRing.style.transform = `translate(${ringX}px, ${ringY}px) translate(-50%, -50%)`;
            cursorRing.style.opacity = mouse.active ? '1' : '0';
        }
        if (cursorCore) {
            cursorCore.style.transform = `translate(${mouse.x}px, ${mouse.y}px) translate(-50%, -50%)`;
            cursorCore.style.opacity = mouse.active ? '1' : '0';
        }

        requestAnimationFrame(animate);
    }

    // Events
    window.addEventListener('resize', resize);

    document.addEventListener('mousemove', (e) => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
        mouse.active = true;
    });

    document.addEventListener('mouseleave', () => {
        mouse.active = false;
    });

    document.addEventListener('mouseenter', () => {
        mouse.active = true;
    });

    // Grow ring on hover over interactive elements
    document.addEventListener('mouseover', (e) => {
        if (e.target.closest('a, button, input, textarea, [role="button"]')) {
            cursorRing?.classList.add('cursor-hover');
        }
    });
    document.addEventListener('mouseout', (e) => {
        if (e.target.closest('a, button, input, textarea, [role="button"]')) {
            cursorRing?.classList.remove('cursor-hover');
        }
    });

    // Init
    resize();
    animate();
}
