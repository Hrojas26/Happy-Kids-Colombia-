@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @guest
        @include('components.login')
    @else
        @include('components.formDonar')
    @endguest
</div>
@endsection
