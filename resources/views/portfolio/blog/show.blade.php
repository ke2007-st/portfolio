@extends('layouts.app')

@section('content')

    <article class="pt-32 pb-24 px-6">
        <div class="max-w-3xl mx-auto">
            <a href="{{ route('portfolio.blog') }}" class="inline-flex items-center gap-2 text-text-muted hover:text-neon-cyan transition text-sm mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Tous les articles
            </a>

            <div class="flex items-center gap-3 text-xs text-text-muted mb-4">
                <span class="badge-violet">{{ $post->reading_time }} min de lecture</span>
                <span>{{ $post->published_at?->format('j F Y') }}</span>
            </div>

            <h1 class="font-display text-3xl md:text-5xl font-bold leading-tight mb-6">
                <span class="text-gradient">{{ $post->title }}</span>
            </h1>

            <p class="text-xl text-text-secondary mb-10 leading-relaxed border-l-2 border-neon-violet/50 pl-4">
                {{ $post->excerpt }}
            </p>

            <div class="prose-neon">
                {!! $post->content !!}
            </div>

            @if($related->isNotEmpty())
                <div class="mt-16 pt-10 border-t border-dark-border">
                    <h2 class="font-display text-sm uppercase tracking-widest text-text-muted mb-6">À lire aussi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($related as $rel)
                            <a href="{{ route('portfolio.post', $rel->slug) }}" class="card-neon p-5 group block">
                                <div class="text-xs text-text-muted mb-2">{{ $rel->reading_time }} min</div>
                                <h3 class="font-display font-bold text-text-primary group-hover:text-neon-cyan transition">{{ $rel->title }}</h3>
                                <p class="text-text-secondary text-sm mt-2 line-clamp-2">{{ $rel->excerpt }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </article>

@endsection
