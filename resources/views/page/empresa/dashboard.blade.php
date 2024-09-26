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
            @include('components.empresa.Sidebar')
            @if (auth()->check())
                @if (auth()->user()->rol === 'empresa')
                    <!-- Todas las gifts -->
                    @if (session()->has('gifts'))
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
                @else
                    <!-- Todos los usuarios CUALQUIER MENU QUE SE AÑADA DEBE QUEDAR ENCIMA DEL ULTIMO -->
                    <div class="col-md-9" id="userAll" style="display: none;">
                        <div class="container">
                            @include('components.empresa.users')
                        </div>
                    </div>
                    <!-- Formularios para crear bonos desde admin -->
                    <div class="col-md-9" id="form-container-empresa" style="display: none;">
                        <div class="container">
                            @include('components.empresa.crearBonos')
                        </div>
                    </div>
                    <!-- Crear usuario desde el admin -->
                    <div class="col-md-9" id="create-user-admin" style="display: none;">
                        <div class="container">
                            <h1 class="text-center" >Crea un usuario o una empresa</h1>
                            <p class="text-center" >Crea usuarios y empresas desde este modulo</p>
                            @include('auth.passwords.registerAdmin')
                        </div>
                    </div>
                    <!-- Ver todos los bonos creados -->
                    <div class="col-md-9" id="show-bonos-admin" style="display: block;">
                        <!-- Cambié el display a block para que sea visible -->
                        <div class="container">

                            @include('components.empresa.giftsAll')
                        </div>
                    </div>

                    <!-- Todas las donaciones -->
                    <div class="col-md-9" id="bonosAdmin" style="display: none;">
                        <div class="container">
                            @include('components.empresa.bonosFull')
                        </div>
                    </div>

                @endif
            @endif
            <!-- infomraicon de usuario -->
            <div class="col-md-9" id="userInfoContainer" style="display: none;">
                <div class="container">
                    @include('components.updatePasswordUser')
                </div>
            </div>
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

        function showUserInfo(element) {
            var formContainer = document.getElementById('form-container');
            var giftsContainer = document.getElementById('gifts-container');
            var userAll = document.getElementById('userAll');
            var bonosAdmin = document.getElementById('bonosAdmin');
            if (formContainer) {
                formContainer.style.display = 'none';
            }
            if (giftsContainer) {
                giftsContainer.style.display = 'none';
            }
            if (userAll) {
                userAll.style.display = 'none';
            }
            if (bonosAdmin) {
                bonosAdmin.style.display = 'none';
            }
            document.getElementById('userInfoContainer').style.display = 'block';
            markActive(element);
        }

        function showUsers(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'block';
            document.getElementById('bonosAdmin').style.display = 'none';
            document.getElementById('form-container-empresa').style.display = 'none';
            document.getElementById('create-user-admin').style.display = 'none';
            document.getElementById('show-bonos-admin').style.display = 'none';
            markActive(element);
        }

        function showEstadoDonaciones(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'none';
            document.getElementById('bonosAdmin').style.display = 'block';
            document.getElementById('form-container-empresa').style.display = 'none';
            document.getElementById('create-user-admin').style.display = 'none';
            document.getElementById('show-bonos-admin').style.display = 'none';
            markActive(element);
        }

        function showFormAdmin(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'none';
            document.getElementById('bonosAdmin').style.display = 'none';
            document.getElementById('form-container-empresa').style.display = 'block';
            document.getElementById('create-user-admin').style.display = 'none';
            document.getElementById('show-bonos-admin').style.display = 'none';
            markActive(element);
        }

        function CreateUserAdmin(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'none';
            document.getElementById('bonosAdmin').style.display = 'none';
            document.getElementById('form-container-empresa').style.display = 'none';
            document.getElementById('create-user-admin').style.display = 'block';
            document.getElementById('show-bonos-admin').style.display = 'none';
            markActive(element);
        }

        function ShowAllBonos(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'none';
            document.getElementById('bonosAdmin').style.display = 'none';
            document.getElementById('form-container-empresa').style.display = 'none';
            document.getElementById('create-user-admin').style.display = 'none';
            document.getElementById('show-bonos-admin').style.display = 'block';
            markActive(element);
        }

        function markActive(element) {
            document.querySelectorAll('.nav-link').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('.dropdown-item').forEach(item => {
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
        $(document).ready(function() {
            order: [[0, 'desc']], // Índice 0 para la primera columna (ID)
            $('#gifts-table').DataTable();
            $('#user-table').DataTable();
            $('#bonosFull').DataTable();
        });
    </script>
</body>

</html>
