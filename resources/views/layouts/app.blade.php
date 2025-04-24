<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>@yield('title', 'Trivia Admin Panel')</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/codebase.min.css') }}">
        <script src="{{ asset('assets/js/setTheme.js') }}"></script>

        @livewireStyles
    </head>
<body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed">

        {{-- Sidebar --}}

            @include('partials.admin.sidebar')

        {{-- Header --}}
        @include('partials.navbar')

        {{-- Main Content --}}
        <main id="main-container">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
    @livewireScripts
</body>
</html>
