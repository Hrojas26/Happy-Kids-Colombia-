<h1 class="">Bonos creados</h1>
<p class="">Aquí se reflejarán todos los bonos creados para los donantes</p>

<table id="gifts-table" class="display">
    <thead>
        <tr>
            <th>Número</th>
            <th>Nombre del bono</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Estado del bono</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @if ($gifts && $gifts->count() > 0)
            @foreach ($gifts as $gift)
                <tr>
                    <td data-order="{{ $gift->id }}">{{ $gift->id }}</td> <!-- Aquí se añade el data-order -->
                    <td>{{ $gift->name }}</td>
                    <td>{{ $gift->description }}</td>
                    <td><img src="{{ $gift->urlimage }}" alt="{{ $gift->name }}" style="width: 50px;"></td>
                    <td>
                        @switch($gift->state)
                            @case(1)
                                Pendiente por reclamar
                            @break

                            @case(2)
                                Reclamado
                            @break

                            @case(3)
                                Canjeada
                            @break

                            @case(4)
                                Expirada
                            @break

                            @case(5)
                                Desactivada
                            @break

                            @default
                                Estado desconocido
                        @endswitch
                    </td>
                    <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No hay bonos disponibles.</td>
            </tr>
        @endif
    </tbody>
</table>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#gifts-table').DataTable({
            order: [
                [0, 'desc']],
            language: {
                "sProcessing":   "Procesando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "No se encontraron resultados",
                "sEmptyTable":   "No hay datos disponibles en esta tabla",
                "sInfo":         "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando registros del 0 al 0 ",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch":       "Buscar:",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>
