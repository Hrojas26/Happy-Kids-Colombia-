<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('particles.js-master/demo/css/style.css') }}">


    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.0.0.min.js"
        integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
        crossorigin="anonymous">
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Scripts -->
</head>
<body class="home">


    @if(auth()->check())
        @if(auth()->user()->rol ==='empresa')
            <script>window.location.href = "{{ route('gifts.all') }}";</script>
        @elseif(auth()->user()->rol ==='admin' )
            <script>window.location.href = "{{ route('user.all') }}";</script>
        @else
            @include('components.inicioGeneral')
        @endif
    @else
        @include('components.inicioGeneral')
    @endif

    <script src="{{ asset('particles.js-master/particles.js') }}"></script>
    <script src="{{ asset('particles.js-master/demo/js/app.js') }}"></script>
    <script src="{{ asset('particles.js-master/demo/js/lib/stats.js') }}"></script>

</body>
</html>
