<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="//fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Solo una versión de jQuery (la más reciente) -->
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <!-- Scripts personalizados (cargados con Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="home">

    <div class="mobile-message">
        <div class="desk-none">
            <i style="font-size: 60px; margin-bottom: 35px;" class="far fa-sad-tear"></i>
            <strong>¡Oops! Disculpa, Happy Kids Colombia solo está disponible en versión Desktop.</strong>
        </div>
    </div>

    @if (auth()->check())
        @if (auth()->user()->rol === 'empresa')
            <script>
                window.location.href = "{{ route('gifts.all') }}";
            </script>
        @elseif(auth()->user()->rol === 'admin')
            <script>
                window.location.href = "{{ route('user.all') }}";
            </script>
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
