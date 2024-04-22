<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Importación de Three.js desde CDN -->
    <script type="importmap">
        {
          "imports": {
            "three": "https://cdn.jsdelivr.net/npm/three@r163/build/three.module.js",
            "three/addons/": "https://cdn.jsdelivr.net/npm/three@r163/examples/jsm/"
          }
        }
    </script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('components.headerPage')

{{-- SLIDER --}}
<div class="container">
    <div class="row">
        <div class="rox">
            <img class="img-fluid bannerp" src="{{ asset('img/1.jpg') }}" alt="...">
            <div id="container3D">
            </div>
        </div>
        {{-- Carrousel para usar --}}
        {{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-wrap="true">
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
        </div> --}}

    </div>
    <div class="row">
        <h1 class="title">Bienvenido a happy kids colombia.</h1>
        <p>
            ¡Bienvenido a nuestra plataforma de donaciones de juguetes! Aquí, encontrarás una forma fácil y segura de hacer una diferencia en la vida de niños necesitados. Únete a nosotros en nuestro esfuerzo por llevar alegría y esperanza a aquellos que más lo necesitan. ¡Haz tu donación hoy y sé parte del cambio!
        </p>
    </div>
</div>
{{-- END SLIDER --}}

{{-- Aquí debe ir el objeto 3D --}}


{{-- Aquí termina el objeto 3D --}}



</body>
</html>
