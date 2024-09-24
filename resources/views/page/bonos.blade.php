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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
@include('components.headerPage')
 
@if ($message)
    <div class="alert alert-info rounded-0 mx-0" role="alert">
        {{ $message }}
    </div>
@endif 
@if (session()->has('success') || session()->has('error'))
    <div id="notification" class="rounded-0 mx-0 mt-3 text-center alert alert-{{ session()->has('success') ? 'success' : 'danger' }}">
        {{ session()->has('success') ? session('success') : session('error') }}
    </div>
@endif
<div class="container-fluid text-center mt-3 px-0">
    <div class="alert alert-info rounded-0" role="alert">
        <p class="mb-0">
            <i class="bi bi-exclamation-triangle"></i>  Recuerda que después de que recojamos tu donación, podrás reclamar tu bono a partir del <strong> siguiente día. </strong> <i class="bi bi-exclamation-triangle"></i>
        </p>
    </div>
</div> 

<div class="container bonosfila">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if ($gifts->isEmpty())  <!-- Verifica si no hay bonos -->
            <div class="container text-center mt-5 w-100">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <img src="{{ asset('img/nobonos.png') }}" alt="Regalo" class="img-fluid">
                    </div>
                </div>
            </div>
        @else
            @foreach ($gifts as $gift)
                @include('components.card')
            @endforeach
        @endif
    </div> <!-- Cierre de la fila principal -->
</div> <!-- Cierre del contenedor de bonos -->

@include('components.footerPage')
<script>
    $(document).ready(function() {
        // Verifica si la alerta está presente
        if ($('#notification').length) {
            // Espera 5 segundos (5000 milisegundos) y luego oculta la alerta
            setTimeout(function() {
                $('#notification').fadeOut('slow');
            }, 5000);
        }
    });
</script>
</body>
</html>
