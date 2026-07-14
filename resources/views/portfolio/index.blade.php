@extends('layouts.app')

@section('content')

    {{-- Hero Section --}}
    <section id="hero" class="relative min-h-screen flex items-center justify-center pt-24 pb-12 px-6">
        <div class="absolute inset-0 overflow-hidden -z-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 rounded-full bg-neon-cyan/10 blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 rounded-full bg-neon-violet/10 blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-5xl mx-auto text-center">
            <div data-reveal class="inline-flex items-center gap-2 px-4 py-2 mb-6 rounded-full badge-neon animate-glow-pulse">
                <span class="w-2 h-2 rounded-full bg-neon-cyan animate-pulse"></span>
                Disponible pour de nouvelles opportunités
            </div>

            <h1 data-reveal class="font-display text-5xl md:text-7xl lg:text-8xl font-black tracking-tight mb-6">
                <span class="block text-text-primary">Soh</span>
                <span class="block text-gradient animate-gradient">Ben Kevine</span>
            </h1>

            <p data-reveal class="text-xl md:text-2xl text-text-secondary mb-4 font-display tracking-widest uppercase">
                junior software engineer
            </p>
            <p data-reveal class="text-text-muted mb-10">
                Abidjan, Côte d'Ivoire · Open to work
            </p>

            <div data-reveal class="flex flex-wrap items-center justify-center gap-4">
                <a href="#contact" class="btn-neon">
                    Me contacter
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </a>
                <a href="#projects" class="btn-outline">Voir mes projets</a>
                <a href="/cv.html" target="_blank" rel="noopener" class="btn-outline">Voir mon CV</a>
            </div>

            <div data-reveal class="mt-12 flex items-center justify-center gap-6">
                <a href="https://github.com/ke2007-st" target="_blank" rel="noopener" class="text-text-secondary hover:text-neon-cyan transition" aria-label="GitHub">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.4-3.9-1.4-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1.1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.8-1.6-2.6-.3-5.3-1.3-5.3-5.7 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17 4.6 18 4.9 18 4.9c.6 1.6.2 2.8.1 3.1.8.8 1.2 1.8 1.2 3.1 0 4.4-2.7 5.4-5.3 5.7.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.3.5 12 .5z"/></svg>
                </a>
                <a href="https://linkedin.com" target="_blank" rel="noopener" class="text-text-secondary hover:text-neon-cyan transition" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3v9zM6.5 8.3a1.7 1.7 0 110-3.5 1.7 1.7 0 010 3.5zM19 19h-3v-4.7c0-1.1 0-2.5-1.5-2.5s-1.7 1.2-1.7 2.4V19h-3v-9h2.9v1.2h.04a3.2 3.2 0 012.9-1.6c3.1 0 3.7 2 3.7 4.7V19z"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-12 text-center">
                <span class="text-gradient">À propos</span>
            </h2>
            <div data-reveal class="card-neon p-8 md:p-12">
                <p class="text-lg md:text-xl text-text-secondary leading-relaxed">
                    Étudiant en <span class="text-neon-cyan font-semibold">Licence 2 MIAGE</span> à l'Université Félix Houphouët-Boigny, je suis un <span class="text-neon-cyan font-semibold">développeur junior sérieux</span> avec déjà plusieurs projets concrets à mon actif (web, mobile, API). Après un stage fullstack chez DKBS Solutions, je construis des applications complètes — de l'architecture à l'UI — en Laravel, React, React Native et Python/Flask.
                </p>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="font-display text-4xl text-gradient-violet font-bold">L2 MIAGE</div>
                        <div class="text-text-muted text-sm mt-1">UFHB — Abidjan</div>
                    </div>
                    <div class="text-center">
                        <div class="font-display text-4xl text-gradient-violet font-bold">1 stage</div>
                        <div class="text-text-muted text-sm mt-1">Fullstack chez DKBS Solutions</div>
                    </div>
                    <div class="text-center">
                        <div class="font-display text-4xl text-gradient-violet font-bold">5+</div>
                        <div class="text-text-muted text-sm mt-1">Projets personnels réels</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Experience Section --}}
    <section id="experience" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-12 text-center">
                <span class="text-gradient">Expérience</span>
            </h2>

            <div class="relative">
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-neon-cyan via-neon-blue to-neon-violet -translate-x-1/2"></div>

                @foreach($experiences as $index => $experience)
                    <div data-reveal class="relative mb-12 {{ $index % 2 === 0 ? 'md:pr-8 md:text-right md:mr-1/2' : 'md:pl-8 md:ml-1/2' }}">
                        <div class="absolute left-4 md:left-1/2 w-4 h-4 rounded-full -translate-x-1/2 mt-6 bg-neon-cyan glow-cyan"></div>
                        <div class="ml-12 md:ml-0 card-neon p-6">
                            <h3 class="text-xl font-display font-bold text-neon-cyan">{{ $experience->title }}</h3>
                            <p class="text-text-secondary mt-1">{{ $experience->company }} · {{ $experience->location }}</p>
                            <p class="text-text-muted text-sm mt-2">
                                {{ $experience->start_date }}
                                @if($experience->is_current)
                                    — Présent
                                @else
                                    — {{ $experience->end_date }}
                                @endif
                            </p>
                            <p class="text-text-secondary mt-4 leading-relaxed">{{ $experience->description }}</p>
                            @if($experience->highlights)
                                <ul class="mt-4 space-y-2 {{ $index % 2 === 0 ? 'md:list-inside' : '' }}">
                                    @foreach($experience->highlights as $highlight)
                                        <li class="text-text-secondary text-sm flex items-start gap-2 {{ $index % 2 === 0 ? 'md:justify-end' : '' }}">
                                            <span class="text-neon-violet mt-1">▸</span>
                                            <span>{{ $highlight }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects Section --}}
    <section id="projects" class="py-24 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-4 text-center">
                <span class="text-gradient">Projets</span>
            </h2>
            <p data-reveal class="text-center text-text-muted mb-12">({{ $projects->count() }})</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <article data-reveal class="card-neon p-6 group">
                        <div class="flex items-center justify-between mb-4">
                            @if($project->status === 'live')
                                <span class="badge-neon">
                                    <span class="w-2 h-2 rounded-full bg-neon-cyan mr-1 animate-pulse"></span>
                                    Live
                                </span>
                            @elseif($project->status === 'in_progress')
                                <span class="badge-violet">In Progress</span>
                            @else
                                <span class="badge-violet">Complete</span>
                            @endif
                            <span class="text-xs text-text-muted">{{ $project->category }}</span>
                        </div>

                        @if($project->image)
                            <div class="mb-4 rounded-lg overflow-hidden border border-dark-border">
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-40 object-cover group-hover:scale-105 transition duration-500">
                            </div>
                        @else
                            <div class="mb-4 h-40 rounded-lg bg-gradient-to-br from-dark-card to-dark-surface border border-dark-border flex items-center justify-center">
                                <span class="font-display text-6xl text-gradient opacity-50">{{ strtoupper(substr($project->title, 0, 1)) }}</span>
                            </div>
                        @endif

                        <h3 class="text-xl font-display font-bold text-text-primary group-hover:text-neon-cyan transition">
                            {{ $project->title }}
                        </h3>

                        <p class="text-text-secondary text-sm mt-2 line-clamp-3">{{ $project->description }}</p>

                        @if($project->technologies)
                            <div class="flex flex-wrap gap-2 mt-4">
                                @foreach($project->technologies as $tech)
                                    <span class="badge-neon text-xs">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center gap-4 mt-6">
                            @if($project->link_live)
                                <a href="{{ $project->link_live }}" target="_blank" rel="noopener" class="text-text-secondary hover:text-neon-cyan transition flex items-center gap-1 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><path d="M15 3h6v6M10 14L21 3"/></svg>
                                    Website
                                </a>
                            @endif
                            @if($project->link_github)
                                <a href="{{ $project->link_github }}" target="_blank" rel="noopener" class="text-text-secondary hover:text-neon-cyan transition flex items-center gap-1 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.4-3.9-1.4-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1.1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.8-1.6-2.6-.3-5.3-1.3-5.3-5.7 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17 4.6 18 4.9 18 4.9c.6 1.6.2 2.8.1 3.1.8.8 1.2 1.8 1.2 3.1 0 4.4-2.7 5.4-5.3 5.7.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.3.5 12 .5z"/></svg>
                                    GitHub
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Education Section --}}
    <section id="education" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-12 text-center">
                <span class="text-gradient">Éducation</span>
            </h2>

            <div class="space-y-6">
                @foreach($educations as $education)
                    <div data-reveal class="card-neon p-6 md:p-8 flex flex-col md:flex-row md:items-center gap-6">
                        <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-gradient-to-br from-neon-violet/30 to-neon-cyan/30 border border-neon-violet flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-neon-cyan"><path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1 2 3 6 3s6-2 6-3v-5"/></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-display font-bold text-text-primary">{{ $education->school }}</h3>
                            <p class="text-neon-cyan mt-1">{{ $education->degree }}</p>
                            @if($education->location)
                                <p class="text-text-muted text-sm mt-1">{{ $education->location }}</p>
                            @endif
                            @if($education->description)
                                <p class="text-text-secondary text-sm mt-3">{{ $education->description }}</p>
                            @endif
                        </div>
                        <div class="text-right">
                            <p class="text-text-secondary font-display">{{ $education->start_year }}</p>
                            <p class="text-text-muted text-sm">— {{ $education->end_year ?? 'Présent' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Skills Section --}}
    <section id="skills" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-12 text-center">
                <span class="text-gradient">Compétences</span>
            </h2>

            <div class="space-y-8">
                @foreach($skillsByCategory as $category => $skillsList)
                    <div data-reveal>
                        <h3 class="font-display text-sm uppercase tracking-widest text-text-muted mb-4">
                            {{ ucfirst($category) }}
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($skillsList as $skill)
                                <div class="card-neon px-4 py-2 !rounded-full hover:scale-105">
                                    <span class="text-text-primary text-sm font-medium">{{ $skill->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- GitHub Activity Section --}}
    <section id="github" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-12 text-center">
                <span class="text-gradient">Activité GitHub</span>
            </h2>
            <div data-reveal class="card-neon p-8">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-neon-cyan to-neon-violet flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24"><path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.4-3.9-1.4-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1.1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.8-1.6-2.6-.3-5.3-1.3-5.3-5.7 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17 4.6 18 4.9 18 4.9c.6 1.6.2 2.8.1 3.1.8.8 1.2 1.8 1.2 3.1 0 4.4-2.7 5.4-5.3 5.7.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.3.5 12 .5z"/></svg>
                    </div>
                    <div>
                        <p class="font-display font-bold text-lg">@ke2007-st</p>
                        <p class="text-text-muted text-sm">4 repositories publics · Fullstack · MIAGE L2</p>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-1 mt-4">
                    @for($i = 0; $i < 84; $i++)
                        @php
                            $intensity = rand(0, 4);
                            $colors = ['bg-dark-card', 'bg-neon-cyan/20', 'bg-neon-cyan/40', 'bg-neon-cyan/70', 'bg-neon-cyan'];
                        @endphp
                        <div class="aspect-square rounded-sm {{ $colors[$intensity] }} border border-dark-border"></div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- Blog Section --}}
    <section id="blog" class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-end justify-between mb-12">
                <h2 data-reveal class="section-title text-3xl md:text-4xl">
                    <span class="text-gradient">Blog</span>
                </h2>
                <a href="{{ route('portfolio.blog') }}" class="text-neon-cyan hover:text-neon-violet transition text-sm">Tous les articles →</a>
            </div>
            <p data-reveal class="text-text-secondary mb-12">Ici je partage mes articles et réflexions.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <article data-reveal class="card-neon p-6 group">
                        <div class="flex items-center gap-3 text-xs text-text-muted mb-3">
                            <span class="badge-violet">{{ $post->reading_time }} min</span>
                            <span>{{ $post->published_at?->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-lg font-display font-bold text-text-primary group-hover:text-neon-cyan transition">
                            {{ $post->title }}
                        </h3>
                        <p class="text-text-secondary text-sm mt-3 line-clamp-3">{{ $post->excerpt }}</p>
                        <a href="{{ route('portfolio.post', $post->slug) }}" class="inline-flex items-center gap-1 text-neon-cyan text-sm mt-4 hover:gap-2 transition-all">
                            Lire l'article
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="py-24 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 data-reveal class="section-title text-3xl md:text-4xl mb-4 text-center">
                <span class="text-gradient">Contact</span>
            </h2>
            <p data-reveal class="text-center text-text-secondary mb-12">
                Une question, une opportunité ou juste envie d'échanger ? Écrivez-moi.
            </p>

            @if(session('success'))
                <div data-reveal class="card-neon p-4 mb-6 border-neon-violet glow-violet">
                    <p class="text-neon-violet text-center">{{ session('success') }}</p>
                </div>
            @endif

            <form data-reveal action="{{ route('portfolio.contact') }}" method="POST" class="card-neon p-6 md:p-8 space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="name" class="block text-sm text-text-secondary mb-2">Nom</label>
                        <input type="text" id="name" name="name" required
                               value="{{ old('name') }}"
                               class="w-full bg-dark-surface border border-dark-border rounded-lg px-4 py-3 text-text-primary focus:border-neon-cyan focus:outline-none focus:glow-cyan transition @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm text-text-secondary mb-2">Email</label>
                        <input type="email" id="email" name="email" required
                               value="{{ old('email') }}"
                               class="w-full bg-dark-surface border border-dark-border rounded-lg px-4 py-3 text-text-primary focus:border-neon-cyan focus:outline-none focus:glow-cyan transition @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-sm text-text-secondary mb-2">Sujet</label>
                    <input type="text" id="subject" name="subject"
                           value="{{ old('subject') }}"
                           class="w-full bg-dark-surface border border-dark-border rounded-lg px-4 py-3 text-text-primary focus:border-neon-cyan focus:outline-none focus:glow-cyan transition @error('subject') border-red-500 @enderror">
                    @error('subject') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="content" class="block text-sm text-text-secondary mb-2">Message</label>
                    <textarea id="content" name="content" rows="5" required
                              class="w-full bg-dark-surface border border-dark-border rounded-lg px-4 py-3 text-text-primary focus:border-neon-cyan focus:outline-none focus:glow-cyan transition resize-none @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-neon w-full md:w-auto">
                        Envoyer le message
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
