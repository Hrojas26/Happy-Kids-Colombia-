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
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>

    <!-- Scripts -->
</head>
<body class="gracias">
@include('components.headerPage')

{{-- CONTENIDO --}}

<div class="container-fluid">
    <div class="row">
        <div class="col colNosotrosText">
            <div class="col-md-6 center mx-auto">
                <section id="nosotrosfilter" class="py-12">
                    <div class="row text-center pb-4">
                        <h2 class="text-4xl font-bold mb-4">¡ {{ Auth::user()->name }} ! </h2>
                        <h5 class="text-lg">Gracias a ti, uno de los 4,240 niños que se encuentran en situación de pobreza podrán recibir al menos un juguete este año, gracias.</h5>
                    </div>

                <div class="row">
                    <div class="col">
                        <div class="container mx-auto ">
                            <div class="text-center ">
                                <img class="img-fluid mx-auto d-block" src="{{ asset('img/ninogrito.png') }}" >
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

<audio id="myAudio" autoplay>
  <source src="{{ asset('img/gritos.mp3') }}" type="audio/mpeg">
  Tu navegador no soporta el elemento de audio.
</audio>




<script>
    document.getElementById('myAudio').volume = 0.5;
    
    // Crea una instancia de JSConfetti
    const confetti = new JSConfetti();

    // Activa el efecto de confeti
    confetti.addConfetti();

     // Función para activar el confeti después de 1 segundo
     setTimeout(function() {
        // Crea una instancia de JSConfetti
        const confetti = new JSConfetti();

        // Activa el efecto de confeti
        confetti.addConfetti();
    }, 500); // 1000 milisegundos = 1 segundo

</script>

@include('components.footerPage')

</body>
</html>



