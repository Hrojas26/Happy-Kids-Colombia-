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
@foreach ($gifts as $gift)
@include('components.card')
@endforeach
@include('components.footerPage')
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
