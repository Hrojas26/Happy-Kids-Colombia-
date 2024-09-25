

<h1>Bonos creados</h1>

<table id="gifts-table" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>URL Image</th>
            <th>Estado</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @if (session('gifts') && is_array(session('gifts')) && count(session('gifts')) > 0)
            @foreach (session('gifts') as $gift)
                <tr>
                    <td>{{ $gift->name }}</td>
                    <td>{{ $gift->description }}</td>
                    <td>{{ $gift->urlimage }}</td>
                    <td>
                        @switch($gift->state)
                            @case(1)
                                Pendiente por canjear
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
                    <td>{{ $gift->created_at->format('d/m/Y') }}</td> <!-- Suponiendo que tienes un campo de fecha -->
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No hay bonos disponibles.</td>
            </tr>
        @endif
    </tbody>
</table>

<script>
$(document).ready(function() {
    // Inicializa DataTables con ordenación descendente en la columna ID
    $('#gifts-table').DataTable({
        "order": [[ 0, "desc" ]] // Ordenar por la primera columna (ID) en forma descendente
    });
});
</script>
