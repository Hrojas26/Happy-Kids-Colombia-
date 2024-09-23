<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    @include('components.headerPage')
    <div class="container">
        <div class="row info-user">
            <h3 class="container-fluid text-center" >¡ Aquí puedes ver tus donaciones y el estado en el que se encuentran !</h3>
            <div class="row info-user">
                <div class="container-fluid text-center">
                    <h5 class="mb-4 " >¿que significa cada estado?</h5>
                    <p class=" btn-hkc" >Cada estado representa una etapa en el viaje de tu donacion. Desde el momento en que decides donar hasta que los niños reciben los juguetes.</p>
                </div>

                <ol>
                    <li>
                        <p class="mb-0 mb-3"> <strong>En camino a la magia:</strong> Hemos coordinado la recogida y pronto pasarán a buscar esas preciosas donaciones que traerán alegría a muchos niños. Gracias por hacer magia desde tu hogar.</p>
                    </li>
                    <li>
                    <p class="mb-0 mb-3"> <strong> En nuestras manos :</strong>¡Ya tenemos los juguetes! Los estamos cuidando y preparando con mucho cariño para que lleguen en perfectas condiciones a esos pequeños que los esperan con ilusión.</p>
                    </li>
                    <li>
                    <p class="mb-0 mb-3"> <strong> Rumbo a una sonrisa:</strong> Los juguetes están viajando hacia los niños. ¡Imagina las sonrisas que pronto iluminarán sus caritas!</p>
                    </li>
                    <li>
                    <p class="mb-0 mb-3"> <strong> Sueños cumplidos:</strong> Misión cumplida! Los juguetes ya están en manos de los niños, y sus sonrisas son nuestro mayor agradecimiento.</p>
                    </li>
                </ol>
            </div>
            @include('components.estadoGraficoMisRegalos')
            @include('components.estadoMisRegalos')
        </div>
        <div class="row info-user">
            @include('components.bonos')
        </div>
        <div class="row info-user">
            @include('components.updatePasswordUser')
        </div>
    </div>
    @include('components.footerPage')

    <!-- CSS de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- jQuery (necesario para DataTables) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#statusOfMyGifts').DataTable();
            $('#bonos').DataTable();

        });
    </script>
</body>

</html>
