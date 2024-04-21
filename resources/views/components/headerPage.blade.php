<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bonos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dona tu regalo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
