<h1>Bonos creados</h1>

<table id="gifts-table" class="display">
    <thead>
        <tr>
            <th>ID</th>
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
                    <td>{{ $gift->id }}</td>
                    <td>{{ $gift->name }}</td>
                    <td>{{ $gift->description }}</td>
                    <td><img src="{{ $gift->urlimage }}" alt="{{ $gift->name }}" style="width: 50px;"></td>
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

