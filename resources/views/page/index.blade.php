<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- Solo una versión de jQuery (la más reciente) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts personalizados (cargados con Vite) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="home">

    @if(auth()->check())
        @if(auth()->user()->rol === 'empresa')
            <script>window.location.href = "{{ route('gifts.all') }}";</script>
        @elseif(auth()->user()->rol === 'admin')
            <script>window.location.href = "{{ route('user.all') }}";</script>
        @else
            @include('components.inicioGeneral')
        @endif
    @else
        @include('components.inicioGeneral')
    @endif

    <!-- Librerías adicionales como Slick -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</body>
</html>
