/**
 * Atomic Cursor — Ionic physics cursor.
 *
 * - Native OS cursor stays functionally active (clicks, hover, text selection)
 *   but is visually hidden via `cursor: none`; events still come from the OS.
 * - A solid "nucleus" core is drawn at the cursor position with a slight
 *   spring-lag for smoothness.
 * - Several "ions" orbit the core on tilted elliptical paths. Each ion chases
 *   its orbital target through a spring + damper, producing inertia, lag and
 *   a subtle bounce on direction changes.
 * - Each ion is linked to the core by a thin "valence bond" line whose
 *   thickness/opacity reacts to distance and cursor speed.
 * - Renders on a single full-screen canvas using requestAnimationFrame and
 *   pointer-events:none so it never blocks interaction.
 * - Disabled on touch / coarse-pointer devices.
 */
export function initAtomicCursor() {
    const canvas = document.getElementById('atomic-cursor');
    if (!canvas) return;

    // Skip on touch / coarse pointers
    const isTouch =
        'ontouchstart' in window ||
        navigator.maxTouchPoints > 0 ||
        window.matchMedia('(pointer: coarse)').matches;
    if (isTouch) return;

    // Respect reduced-motion preference: render a static core only
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const ctx = canvas.getContext('2d');
    const DPR = Math.min(window.devicePixelRatio || 1, 2);

    let width = 0;
    let height = 0;

    const COLORS = {
        cyan: '0, 240, 255',
        blue: '0, 102, 255',
        violet: '139, 92, 246',
        white: '255, 255, 255',
    };
    const PALETTE = [COLORS.cyan, COLORS.blue, COLORS.violet];

    // Mouse state (raw position from OS)
    const mouse = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2,
        px: window.innerWidth / 2,
        py: window.innerHeight / 2,
        vx: 0,
        vy: 0,
        speed: 0,
        active: false,
        hovering: false,
    };

    // Nucleus: smoothed core position with spring physics (creates lag/bounce)
    const core = {
        x: mouse.x,
        y: mouse.y,
        vx: 0,
        vy: 0,
    };

    /** @type {Ion[]} */
    let ions = [];

    /**
     * @typedef {Object} Ion
     * @property {number} angle
     * @property {number} angularVelocity
     * @property {number} direction
     * @property {number} baseRadius
     * @property {number} currentRadius
     * @property {number} radiusPhase
     * @property {number} radiusSpeed
     * @property {number} tilt
     * @property {number} tiltSpeed
     * @property {number} eccentricity
     * @property {string} color
     * @property {number} size
     * @property {number} x
     * @property {number} y
     * @property {number} lagX
     * @property {number} lagY
     * @property {number} vx
     * @property {number} vy
     */
    function setupIons() {
        const count = 5;
        ions = [];
        for (let i = 0; i < count; i++) {
            ions.push({
                angle: (i / count) * Math.PI * 2 + Math.random() * 0.6,
                angularVelocity: 0.008 + Math.random() * 0.012,
                direction: i % 2 === 0 ? 1 : -1,
                baseRadius: 30 + Math.random() * 16,
                currentRadius: 30,
                radiusPhase: Math.random() * Math.PI * 2,
                radiusSpeed: 0.015 + Math.random() * 0.02,
                tilt: Math.random() * Math.PI * 2,
                tiltSpeed: 0.0025 + Math.random() * 0.003,
                eccentricity: 0.55 + Math.random() * 0.35, // ellipse squash factor
                color: PALETTE[i % PALETTE.length],
                size: 2.2 + Math.random() * 1.3,
                x: core.x,
                y: core.y,
                lagX: core.x,
                lagY: core.y,
                vx: 0,
                vy: 0,
            });
        }
    }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = Math.max(1, Math.floor(width * DPR));
        canvas.height = Math.max(1, Math.floor(height * DPR));
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(DPR, 0, 0, DPR, 0, 0);
    }

    function updateCore() {
        // Spring follow: pulls toward mouse, damped -> smooth lag + tiny bounce
        const dx = mouse.x - core.x;
        const dy = mouse.y - core.y;
        core.vx += dx * 0.32;
        core.vy += dy * 0.32;
        core.vx *= 0.6;
        core.vy *= 0.6;
        core.x += core.vx;
        core.y += core.vy;
    }

    function updateIons() {
        // Speed factor stretches orbits when moving fast -> inertia feel
        const speedFactor = Math.min(mouse.speed / 28, 1.4);

        for (const ion of ions) {
            ion.angle += ion.angularVelocity * ion.direction * (1 + speedFactor * 1.6);
            ion.radiusPhase += ion.radiusSpeed;
            ion.tilt += ion.tiltSpeed;

            // Breathing radius + stretch from cursor speed
            const breath = Math.sin(ion.radiusPhase) * 3.5;
            const target = ion.baseRadius + breath + speedFactor * 14;
            ion.currentRadius += (target - ion.currentRadius) * 0.12;

            // Elliptical orbit on a tilted plane (gives a 3D-ish electron-shell feel)
            const a = ion.angle;
            const ox = Math.cos(a) * ion.currentRadius;
            const oy = Math.sin(a) * ion.currentRadius * ion.eccentricity;
            const cosT = Math.cos(ion.tilt);
            const sinT = Math.sin(ion.tilt);
            const tx = core.x + ox * cosT - oy * sinT;
            const ty = core.y + ox * sinT + oy * cosT;

            // Spring-damper so ions trail the orbital target (lag + bounce)
            const lx = tx - ion.lagX;
            const ly = ty - ion.lagY;
            ion.vx += lx * 0.28;
            ion.vy += ly * 0.28;
            ion.vx *= 0.72;
            ion.vy *= 0.72;
            ion.lagX += ion.vx;
            ion.lagY += ion.vy;
            ion.x = ion.lagX;
            ion.y = ion.lagY;
        }
    }

    function drawBonds() {
        for (const ion of ions) {
            const dx = ion.x - core.x;
            const dy = ion.y - core.y;
            const dist = Math.sqrt(dx * dx + dy * dy);
            const stretch = Math.min(1, dist / 70);
            const grad = ctx.createLinearGradient(core.x, core.y, ion.x, ion.y);
            grad.addColorStop(0, `rgba(${COLORS.cyan}, ${0.85})`);
            grad.addColorStop(1, `rgba(${ion.color}, ${0.35 + 0.45 * stretch})`);
            ctx.strokeStyle = grad;
            ctx.lineWidth = 1 + Math.min(2.2, mouse.speed * 0.045);
            ctx.beginPath();
            ctx.moveTo(core.x, core.y);
            ctx.lineTo(ion.x, ion.y);
            ctx.stroke();
        }
    }

    function drawIons() {
        for (const ion of ions) {
            // Halo
            const halo = ctx.createRadialGradient(ion.x, ion.y, 0, ion.x, ion.y, ion.size * 5);
            halo.addColorStop(0, `rgba(${ion.color}, 0.85)`);
            halo.addColorStop(1, `rgba(${ion.color}, 0)`);
            ctx.fillStyle = halo;
            ctx.beginPath();
            ctx.arc(ion.x, ion.y, ion.size * 5, 0, Math.PI * 2);
            ctx.fill();

            // Solid ion
            ctx.fillStyle = `rgba(${ion.color}, 1)`;
            ctx.beginPath();
            ctx.arc(ion.x, ion.y, ion.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function drawCore() {
        // Outer glow
        const glow = ctx.createRadialGradient(core.x, core.y, 0, core.x, core.y, 22);
        glow.addColorStop(0, `rgba(${COLORS.cyan}, 0.95)`);
        glow.addColorStop(0.35, `rgba(${COLORS.cyan}, 0.35)`);
        glow.addColorStop(1, `rgba(${COLORS.cyan}, 0)`);
        ctx.fillStyle = glow;
        ctx.beginPath();
        ctx.arc(core.x, core.y, 22, 0, Math.PI * 2);
        ctx.fill();

        // Hover ring
        if (mouse.hovering) {
            ctx.strokeStyle = `rgba(${COLORS.violet}, 0.7)`;
            ctx.lineWidth = 1.4;
            ctx.beginPath();
            ctx.arc(core.x, core.y, 14, 0, Math.PI * 2);
            ctx.stroke();
        }

        // White-hot nucleus dot (the clickable-looking core)
        ctx.fillStyle = `rgba(${COLORS.white}, 1)`;
        ctx.beginPath();
        ctx.arc(core.x, core.y, 3.2, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = `rgba(${COLORS.cyan}, 1)`;
        ctx.beginPath();
        ctx.arc(core.x, core.y, 2, 0, Math.PI * 2);
        ctx.fill();
    }

    function draw() {
        ctx.clearRect(0, 0, width, height);
        if (!mouse.active) {
            // Still draw a faint core when idle in window
            drawCore();
            return;
        }
        drawBonds();
        drawIons();
        drawCore();
    }

    function loop() {
        // Mouse velocity / speed (smoothed)
        mouse.vx = mouse.x - mouse.px;
        mouse.vy = mouse.y - mouse.py;
        mouse.speed = Math.sqrt(mouse.vx * mouse.vx + mouse.vy * mouse.vy);
        mouse.px = mouse.x;
        mouse.py = mouse.y;

        updateCore();
        if (!reducedMotion) updateIons();
        else {
            // Static ring around core
            for (const ion of ions) {
                const a = ion.angle;
                const ox = Math.cos(a) * ion.baseRadius;
                const oy = Math.sin(a) * ion.baseRadius * ion.eccentricity;
                const cosT = Math.cos(ion.tilt);
                const sinT = Math.sin(ion.tilt);
                ion.x = core.x + ox * cosT - oy * sinT;
                ion.y = core.y + ox * sinT + oy * cosT;
            }
        }
        draw();
        requestAnimationFrame(loop);
    }

    // --- Events ---
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

    // Hover state on interactive elements -> shows violet ring around core
    const interactiveSelector = 'a, button, input, textarea, select, label, [role="button"], [data-cursor-hover]';
    document.addEventListener('mouseover', (e) => {
        if (e.target.closest && e.target.closest(interactiveSelector)) {
            mouse.hovering = true;
        }
    });
    document.addEventListener('mouseout', (e) => {
        if (e.target.closest && e.target.closest(interactiveSelector)) {
            mouse.hovering = false;
        }
    });

    // Hide native cursor across the document (OS events still drive everything)
    document.documentElement.classList.add('atomic-cursor-active');

    // Init
    resize();
    setupIons();
    loop();
}
