<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
{{-- <link rel="stylesheet" href="{{ asset('../css/app.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<script src="{{ asset('assets/js/app.js') }}"></script>


@fluxAppearance
