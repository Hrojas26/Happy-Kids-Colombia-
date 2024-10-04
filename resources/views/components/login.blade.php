<!-- Section: Design Block -->
<div id="particles-js" style="position: absolute; width: 100%; height: 680px; z-index: -1;"></div>
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
                    Iniciar sesión <br />
                    <span style="color: hsl(218, 81%, 75%)">en tu cuenta</span>
                </h1>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        @if (session()->has('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <div style="margin-left: 10px;">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="w-100" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', request()->input('email')) }}" required autocomplete="email" autofocus placeholder="Correo">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-hkc mb-4 w-100">
                                {{ __('Iniciar sesión') }}
                            </button>

                            <!-- Remember me checkbox -->
                            <div class="form-check d-flex align-items-center text-left mb-2 px-0">
                                <label class="form-check-label" for="remember">
                                    <input class="form-check-input visually-hidden" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="custom-checkbox"></span> Mantener sesión iniciada
                                </label>
                            </div>

                            <!-- Link to password request -->
                            <div class="text-left">
                                <a class="forgot-password-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
