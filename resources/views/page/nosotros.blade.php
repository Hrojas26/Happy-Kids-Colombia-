<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="//fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <script
        src="//code.jquery.com/jquery-3.0.0.min.js"
        integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
        crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Scripts -->
</head>
<body id="nosotros">
@include('components.headerPage')
{{-- popup --}}
{{-- @include('components.Popup', ['popUpId' => 'PopUpHome','title' => '¡Interactua con nuestros objetos 3D!','videoUrl' => asset('img/robot.mp4'),'modalDescripcion' => '¡ Hola bienvenido a Happy Kids Colombia ! explora nuestra web y juega con nuestros objetos 3D, oprime y arrastra.']) --}}
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
                      <h2 class="text-4xl font-bold mb-4">¡Conoce a los Creadores!</h2>
                      @if(Auth::check())
                      <p class="text-lg">¡Hola {{ Auth::user()->name }}, estamos encantados de conocerte. Somos Heisemberth Mario y Nicolas Yosa, los creadores detrás de HAPPY KIDS COLOMBIA</p>
                  @else
                      <p class="text-lg">¡Hola, estamos encantados de conocerte. Somos heisemberth Mario y Nicolas Yosa, los creadores detrás de HAPPY KIDS COLOMBIA</p>
                  @endif
                    </div>
                    <div class="max-w-lg mx-auto">
                      <div class="d-flex justify-content-center">
                        <img class="circuloImg m-2"src="{{ asset('img/mario.jpg') }}" alt="Tu Foto"class="rounded-full w-64 h-64 mx-auto m-1">
                        <img class="circuloImg m-2"src="{{ asset('img/nico.jpg') }}" alt="Tu Foto" class="rounded-full w-64 h-64 mx-auto ">
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <h3 class="text-2xl font-bold mb-4 text-center">Mario</h3>
                            <p class="text-lg mb-4 text-center">Soy apasionado por la innovación y creatividad, buscando soluciones originales a problemas diarios. Con Kappy Kids Colombia, nuestro objetivo es crear productos funcionales, inspiradores y emocionantes. Estamos emocionados de compartir este viaje contigo y esperamos que te inspire lo que hacemos.</p>
                        </div>
                        <div class="col-6">
                            <h3 class="text-2xl font-bold mb-4 text-center">Nicolas</h3>
                            <p class="text-lg mb-4 text-center">Me motiva transformar ideas en realidad. En Kappy Kids Colombia, diseñamos productos que resuelven necesidades y transmiten creatividad. Queremos que cada experiencia te haga sonreír y ver el mundo de forma diferente. ¡Esperamos inspirarte con lo que creamos! 🚀

                            </p>
                        </div>

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
