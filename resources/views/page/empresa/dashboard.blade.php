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
            @if(auth()->check())
                @if(auth()->user()->rol ==='empresa')
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
                @else
                <!-- Todos los usuarios -->
                <div class="col-md-9" id="userAll" style="display: none;">
                    <div class="container">
                        @include('components.empresa.users')
                    </div>
                </div>
                <!-- Todos los Bonos -->
                <div class="col-md-9" id="bonosAdmin" style="display: none;">
                    <div class="container">
                        <h1>Todos bonos</h1>
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
            markActive(element);
        }
        function showGiftsAdmin(element) {
            document.getElementById('userInfoContainer').style.display = 'none';
            document.getElementById('userAll').style.display = 'none';
            document.getElementById('bonosAdmin').style.display = 'block';
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
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#gifts-table').DataTable();
            $('#user-table').DataTable();

        });
    </script>
</body>

</html>
