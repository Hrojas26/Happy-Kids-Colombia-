@extends('layouts.app')

@section('content')
<div id="particles-js" style="position: absolute; width: 100%; height: 893px; z-index: -1;"></div>
<section class="background-radial-gradient overflow-hidden">

    <style>
        body {
            background: #763199;
        }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Regístrate <br />
                    <span style="color: hsl(218, 81%, 75%)">crea tu cuenta</span>
                </h1>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form class="w-100" method="POST" action="{{ route('crear.user') }}">
                            @csrf

                            <!-- Tipo de usuario -->
                            <div class="form-group mb-4 text-center">
                                <label class="fs-4" for="tipo">¿Cómo te quieres registrar?</label><br>
                                <div class="d-flex mt-2 justify-content-center gap-3 align-items-center">
                                    <label class="form-check-label" for="persona">
                                        <input class="form-check-input visually-hidden" type="radio" name="tipo" id="persona" value="persona" checked>
                                        <span class="custom-radio"></span> Donante
                                    </label>
                                    <label class="form-check-label" for="empresa">
                                        <input class="form-check-input visually-hidden" type="radio" name="tipo" id="empresa" value="empresa">
                                        <span class="custom-radio"></span> Empresa
                                    </label>
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div class="form-outline mb-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-outline mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-outline mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-outline mb-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma la contraseña" required autocomplete="new-password">
                            </div>

                            <!-- Botón de registro -->
                            <button type="submit" class="btn btn-hkc w-100 mb-4">{{ __('Regístrate') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('persona').addEventListener('change', function () {
            document.getElementById('name').setAttribute('placeholder', 'Nombre');
        });

        document.getElementById('empresa').addEventListener('change', function () {
            document.getElementById('name').setAttribute('placeholder', 'Empresa');
        });
    });
</script>
@endsection
