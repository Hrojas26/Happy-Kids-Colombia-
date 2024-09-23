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

@if ($message)
    <div class="alert alert-info" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container text-center mt-5">
    <div class="alert alert-info" role="alert">
        <p class="mb-0">
            <i class="bi bi-exclamation-triangle"></i>  Recuerda que después de que recojamos tu donación, podrás reclamar tu bono a partir del siguiente día. <i class="bi bi-exclamation-triangle"></i>
        </p>
    </div>
</div>

<div class="container bonosfila">
    @if ($gifts->isEmpty())  <!-- Verifica si no hay bonos -->
    <div class="container text-center mt-5">
        <div class="row align-items-center">
            <div class="col-md-12">
                <img src="{{ asset('img/nobonos.png') }}" alt="Regalo" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @else
            @foreach ($gifts as $gift)
                @include('components.card')
            @endforeach
        @endif
    </div>
</div>

@if (session()->has('success') || session()->has('error'))
    <div id="notification" class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }}">
        {{ session()->has('success') ? session('success') : session('error') }}
    </div>
@endif

@include('components.footerPage')
</body>
</html>
