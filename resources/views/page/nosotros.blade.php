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
    <script
        src="https://code.jquery.com/jquery-3.0.0.min.js"
        integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
        crossorigin="anonymous">
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Scripts -->
</head>
<body id="nosotros">
@include('components.headerPage')
{{-- popup --}}
@include('components.Popup', ['popUpId' => 'PopUpHome','title' => '¡Interactua con nuestros objetos 3D!','videoUrl' => asset('img/robot.mp4'),'modalDescripcion' => '¡ Hola bienvenido a Happy Kids Colombia ! explora nuestra web y juega con nuestros objetos 3D, oprime y arrastra.'])
{{-- popup end --}}


{{-- CONTENIDO --}}

<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <img class="boy" src="{{ asset('img/nino.png') }}">
            </div>
        </div>

        <div class="col colNosotrosText">
            <img class="boyright " src="{{ asset('img/cohete.png') }}">
            <div class="col-md-12">
                <section id="nosotrosfilter" class="py-12">
                  <div class="container mx-auto px-4 center">
                    <div class="text-center mb-8">
                      <h2 class="text-4xl font-bold mb-4">¡Conoce al Creador!</h2>
                      @if(Auth::check())
                      <p class="text-lg">¡Hola {{ Auth::user()->name }}, estoy encantado de conocerte. Soy Heisemberth, el creador detrás de HAPPY KIDS COLOMBIA</p>
                  @else
                      <p class="text-lg">¡Hola, estoy encantado de conocerte. Soy Heisemberth, el creador detrás de HAPPY KIDS COLOMBIA</p>
                  @endif
                    </div>
                    <div class="max-w-lg mx-auto">
                      <div class="mb-8">
                        <img class="circuloImg"src="{{ asset('img/mario.jpg') }}" alt="Tu Foto" class="rounded-full w-64 h-64 mx-auto mb-4">
                      </div>
                      <div class="text-justify text-center">
                        <h3 class="text-2xl font-bold mb-4">Heisemberth Mario</h3>
                        <p>Ingeniero de sistemas y desarollador web</p>
                        <p class="text-lg mb-4">Soy un apasionado de la innovación y la creatividad. Desde una edad temprana, he estado obsesionado con encontrar soluciones creativas a los problemas cotidianos.</p>
                        <p class="text-lg mb-4">Con [Nombre de tu empresa], mi objetivo es llevar esa pasión al mundo, creando productos que no solo sean funcionales, sino también inspiradores y emocionantes.</p>
                        <p class="text-lg">Estoy emocionado de compartir mi viaje contigo y espero que encuentres inspiración en lo que hacemos. 🚀</p>
                      </div>
                    </div>
                  </div>
                </section>
              </div>


        </div>
    </div>
</div>


{{-- CONTENIDO --}}




@include('components.footerPage')

</body>
</html>
