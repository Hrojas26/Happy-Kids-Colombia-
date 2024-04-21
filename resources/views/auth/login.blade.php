@extends('layouts.app')

@section('content')
<div class="container">
    @guest
        @include('components.login')
    @else
        @include('components.formDonar')
    @endguest
</div>
@endsection
