<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('crear.user') }}">
                        @csrf

                        <!-- Selección de tipo de usuario -->
                        <div class="form-group text-center">
                            <h5 for="tipo text-center ">Seleccione el tipo de usuario:</h5><br>
                            <div class="d-flex justify-content-center mb-2">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="tipo" id="persona" value="persona" checked>
                                    <label class="form-check-label" for="persona">Donante</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="empresa" value="empresa">
                                    <label class="form-check-label" for="empresa">Empresa</label>
                                </div>
                            </div>
                        </div>

                        <!-- Nombre o Empresa -->
                        <div class="row mb-3">
                            <label for="name" class="col-form-label text-md-start" id="nameLabel">Nombre</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="row mb-3">
                            <label for="email" class="col-form-label text-md-start">{{ __('Correo electrónico') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="row mb-3">
                            <label for="password" class="col-form-label text-md-start">{{ __('Contraseña') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-form-label text-md-start">{{ __('Confirma tu contraseña') }}</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Botón de registro -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-hkc">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('persona').addEventListener('change', function () {
            var label = document.getElementById('nameLabel');
            label.textContent = 'Nombre';
        });

        document.getElementById('empresa').addEventListener('change', function () {
            var label = document.getElementById('nameLabel');
            label.textContent = 'Empresa';
        });
    });
</script>
