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
<div class="rox">

    <div class="row">
        <div class="col-12 px-0">
            <img class="img-fluid w-100" src="{{ asset('img/1.jpg') }}" alt="...">
            <div id="container3D">
            </div>
            <div class="card w-40 cardbanner">
                <div class="card-body">
                  <h5 class="card-title">BIENVENIDO A HAPPY KIDS COLOMBIA</h5>
                  <p class="card-text">"La magia de la infancia está en tus manos."</p>
                  <a href="#" class="btn btn-dark">donar un juguete</a>
                </div>
              </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="rox">
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
        {{-- Carrousel para usar end --}}

    </div>
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Cambia una Vida</h5>
                  <p class="card-text">Tu donación tiene un impacto directo en la vida de un niño. Con tu contribución, proporcionas alegría, esperanza y oportunidades para un futuro mejor.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Forma Parte de Nuestra Comunidad</h5>
                  <p class="card-text">Al donar, te unes a una comunidad solidaria comprometida con el bienestar de los demás. Juntos, hacemos posible que más niños tengan acceso a juguetes y experiencias positivas.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card3.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Reduce, Reutiliza, Recicla</h5>
                  <p class="card-text">Donar juguetes usados promueve la sostenibilidad ambiental al reducir residuos y fomentar la reutilización. Contribuyes a cuidar el planeta al dar una segunda vida a objetos que de otro modo podrían terminar en un vertedero.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card4.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Recompensa por tu Generosidad</h5>
                  <p class="card-text">Al donar 10 juguetes, recibes un cupón de descuento exclusivo como agradecimiento por tu generosidad. Disfruta de descuentos como una forma de reconocimiento por tu contribución a nuestra causa solidaria.</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
