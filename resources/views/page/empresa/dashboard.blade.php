<!DOCTYPE html>
<html lang="en">
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
@include('components.empresa.headerDashboard')
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <h3>Sidebar</h3>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-4">DASHBOARD</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page" onclick="showForm(this)">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Crea Bonos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="showGifts(this)">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Bonos
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#" onclick="showUserInfo()">Informacion de usuario</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Todas las gifts -->
        @if(session()->has('gifts'))
        <div class="col-md-9" id="gifts-container" style="display: none;">
            <div class="container">
                @include('components.empresa.giftsAll')
            </div>
        </div>
        @endif



        <!-- Formulario -->
        <div class="col-md-9" id="form-container" style="display: none;">
            <div class="container">
                @include('components.empresa.crearBonos')
            </div>
        </div>
    </div>
    <div class="col-md-9" id="userInfoContainer" style="display: none;">
            <div class="container">
            @include('components.updatePasswordUser')
            </div>
    </div>
</div>



@if (session()->has('success') || session()->has('error'))
    <div id="notification" class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }}">
        {{ session()->has('success') ? session('success') : session('error') }}
    </div>
@endif
@include('components.footerPage')
<script>
    function showForm(element) {
        document.getElementById('gifts-container').style.display = 'none';
        document.getElementById('form-container').style.display = 'block';
        document.getElementById('userInfoContainer').style.display = 'none';
        markActive(element);
    }

    function showGifts(element) {
        document.getElementById('form-container').style.display = 'none';
        document.getElementById('gifts-container').style.display = 'block';
        document.getElementById('userInfoContainer').style.display = 'none';
        markActive(element);
    }

    function showUserInfo() {
        document.getElementById('form-container').style.display = 'none';
        document.getElementById('gifts-container').style.display = 'none';
        document.getElementById('userInfoContainer').style.display = 'block';
        markActive(element);
        }

    function markActive(element) {
        document.querySelectorAll('.nav-link').forEach(item => {
            item.classList.remove('active');
        });
        element.classList.add('active');
    }
</script>
<!-- CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#gifts-table').DataTable();
    });
</script>
</body>
</html>
