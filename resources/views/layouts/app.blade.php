<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Trivia - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/codebase.min.css') }}">
    @livewireStyles
</head>
<body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed">

        {{-- Sidebar --}}
        @if(auth()->user()->hasRole('admin'))
            @include('partials.admin.sidebar')
        @else
            @include('partials.user.sidebar')
        @endif

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
