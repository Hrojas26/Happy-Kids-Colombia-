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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('components.headerPage')
<div class="container">
    <br>
    @include('components.formDonar')
    <br>
</div>
@if (isset($message) && $message !== '')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif
@include('components.footerPage')
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
</body>
</html>
