<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} — junior Software Engineer</title>
    <meta name="description" content="Portfolio dynamique d'un ingénieur logiciel full-stack. Projets, expériences, compétences et blog.">
    <meta property="og:title" content="{{ config('app.name') }} — Senior Software Engineer">
    <meta property="og:description" content="Portfolio dynamique d'un ingénieur logiciel full-stack.">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark-bg text-text-primary antialiased">
    <!-- Background effects -->
    <div class="fixed inset-0 -z-10 bg-grid opacity-30"></div>
    <div class="fixed inset-0 -z-10 bg-radial-neon"></div>

    <!-- Neon universe background network (canvas, behind content) -->
    <canvas id="neon-canvas" class="neon-universe-bg" aria-hidden="true"></canvas>

    <!-- Atomic / ionic custom cursor (canvas overlay, never blocks interaction) -->
    <canvas id="atomic-cursor" class="atomic-cursor" aria-hidden="true"></canvas>

    <!-- Navbar -->
    @include('portfolio.partials.navbar')

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('portfolio.partials.footer')
</body>
</html>
