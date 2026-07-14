@extends('layouts.app')

@section('content')

    <section class="pt-32 pb-20 px-6">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 text-text-muted hover:text-neon-cyan transition text-sm mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Retour à l'accueil
            </a>

            <h1 data-reveal class="section-title text-4xl md:text-5xl mb-4">
                <span class="text-gradient">Blog</span>
            </h1>
            <p data-reveal class="text-text-secondary mb-12 max-w-2xl">
                Retours d'expérience, apprentissages et reflexions sur le développement — du projet étudiant au déploiement en production.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                    <article data-reveal class="card-neon p-6 group flex flex-col">
                        <div class="flex items-center gap-3 text-xs text-text-muted mb-3">
                            <span class="badge-violet">{{ $post->reading_time }} min</span>
                            <span>{{ $post->published_at?->format('M j, Y') }}</span>
                        </div>
                        <h2 class="text-xl font-display font-bold text-text-primary group-hover:text-neon-cyan transition">
                            {{ $post->title }}
                        </h2>
                        <p class="text-text-secondary text-sm mt-3 flex-1">{{ $post->excerpt }}</p>
                        <a href="{{ route('portfolio.post', $post->slug) }}" class="inline-flex items-center gap-1 text-neon-cyan text-sm mt-4 hover:gap-2 transition-all self-start">
                            Lire l'article
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
