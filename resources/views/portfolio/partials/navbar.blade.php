<nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-lg bg-dark-bg/70 border-b border-dark-border">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="#hero" class="flex items-center gap-2 group">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-neon-cyan via-neon-blue to-neon-violet animate-gradient flex items-center justify-center font-display font-bold text-dark-bg">
                A
            </div>
            <span class="font-display font-bold text-lg tracking-wider text-gradient">PORTFOLIO</span>
        </a>

        <!-- Desktop nav -->
        <ul class="hidden md:flex items-center gap-8 text-sm">
            <li><a href="#about" class="nav-link text-text-secondary hover:text-neon-cyan transition">À propos</a></li>
            <li><a href="#experience" class="nav-link text-text-secondary hover:text-neon-cyan transition">Expérience</a></li>
            <li><a href="#projects" class="nav-link text-text-secondary hover:text-neon-cyan transition">Projets</a></li>
            <li><a href="#education" class="nav-link text-text-secondary hover:text-neon-cyan transition">Éducation</a></li>
            <li><a href="#skills" class="nav-link text-text-secondary hover:text-neon-cyan transition">Compétences</a></li>
            <li><a href="#blog" class="nav-link text-text-secondary hover:text-neon-cyan transition">Blog</a></li>
            <li><a href="#contact" class="btn-outline text-sm">Contact</a></li>
        </ul>

        <!-- Mobile menu button -->
        <button x-data="{ open: false }" @click="open = !open" class="md:hidden text-neon-cyan p-2">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 6l12 12M6 18L18 6"/></svg>
        </button>
    </div>

    <!-- Mobile menu -->
    <div x-data="{ open: false }" x-show="open" class="md:hidden border-t border-dark-border bg-dark-surface/95 backdrop-blur">
        <ul class="flex flex-col gap-4 p-6">
            <li><a href="#about" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">À propos</a></li>
            <li><a href="#experience" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">Expérience</a></li>
            <li><a href="#projects" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">Projets</a></li>
            <li><a href="#education" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">Éducation</a></li>
            <li><a href="#skills" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">Compétences</a></li>
            <li><a href="#blog" @click="open = false" class="block text-text-secondary hover:text-neon-cyan">Blog</a></li>
            <li><a href="#contact" @click="open = false" class="btn-outline w-full justify-center">Contact</a></li>
        </ul>
    </div>
</nav>
