<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Informate</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bonos') }}">Bonos</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Dona tu regalo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div id="message-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="alert alert-info" role="alert">
              Este es el primer mensaje.
            </div>
          </div>
          <div class="carousel-item">
            <div class="alert alert-warning" role="alert">
              Este es el segundo mensaje.
            </div>
          </div>
          <div class="carousel-item">
            <div class="alert alert-success" role="alert">
              Este es el tercer mensaje.
            </div>
          </div>
        </div>
      </div>

</div>
