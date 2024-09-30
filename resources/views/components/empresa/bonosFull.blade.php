<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Todas las donaciones</h1>
            <table id="bonosFull" class="display ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Fecha de colección</th>
                        <th>Hora de colección</th>
                        <th>Número de juguetes</th>
                        <th>Observaciones</th>
                        <th>Estado</th>
                        <th>Acciones</th> <!-- Nueva columna para editar el estado -->

                        <!-- Agrega más columnas según tus datos -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donationes as $donationD)
                        <tr>
                            <td>{{ $donationD->donation->id }}</td>
                            <td>{{ $donationD->user->name }}</td>
                            <td>{{ $donationD->donation->dateCollection }}</td>
                            <td>{{ $donationD->donation->timeCollection }}</td>
                            <td>{{ $donationD->donation->numberToys }}</td>
                            <td>{{ $donationD->donation->observations }}</td>
                            <td>{{ $donationD->status }}</td>
                            <td>
                                <!-- Formulario en línea para editar el estado -->
                                <form action="{{ route('updateStatus', $donationD->donation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="en_recogida">En recogida</option>
                                        <option value="en_proceso_administrativo">En proceso administrativo</option>
                                        <option value="en_proceso_entrega">En proceso entrega</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <button id="downloadExcel" class="btn-excel btn-hkc">
        <i class="far fa-file-excel "></i> Descargar informe
    </button>
<!-- Librería XLSX (debe estar antes de usarla en cualquier script) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<!-- Librería XLSX (debe estar antes de usarla en cualquier script) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#bonosFull').DataTable({
        "order": [[ 0, "desc" ]], // Ordenar por la primera columna (ID) en forma descendente
        "scrollX": true, // Habilita el desplazamiento horizontal
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});
</script>
<style>
    th, td {
        white-space: nowrap; /* Evita el salto de línea en las celdas */
    }
</style>
