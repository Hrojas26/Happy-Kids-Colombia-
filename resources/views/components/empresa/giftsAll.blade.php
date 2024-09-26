<h1 class="">Bonos creados</h1>
<p class="">Aquí podras ver todos los bonos que los donantes han creado</p>

<table id="gifts-table" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>URL Image</th>
            <th>Estado</th>
            <th>Fecha</th>
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
                <td colspan="5">No hay bonos disponibles.</td>
            </tr>
        @endif
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#gifts-table').DataTable({
            order: [
                [0, 'desc']
            ], // Índice 0 para la primera columna (ID)
        });
    });
</script>
