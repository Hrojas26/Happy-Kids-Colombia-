<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('components.headerPage')

{{-- SLIDER --}}

<div class="container">
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-wrap="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/3.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
         </div>
    </div>

    <div class="row">
        <H1 class="title"> Bienvenido a happy kids colombia.</H1>
        <p>
            ¡Bienvenido a nuestra plataforma de donaciones de juguetes! Aquí, encontrarás una forma fácil y segura de hacer una diferencia en la vida de niños necesitados. Únete a nosotros en nuestro esfuerzo por llevar alegría y esperanza a aquellos que más lo necesitan. ¡Haz tu donación hoy y sé parte del cambio! </p>
    </div>

</div>

{{-- END SLIDER --}}
<!-- Ojo mario, contenido estatico -->

@include('components.footerPage')
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
