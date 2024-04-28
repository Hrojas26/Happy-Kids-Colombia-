 <h1>Gifts Table</h1>
    <table id="gifts-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>URL Image</th>
                <th>Estado</th>
                <th>Fecha</th>
                <!-- Agrega más columnas según los datos que quieras mostrar -->
            </tr>
        </thead>
        <tbody>
            <!-- Itera sobre la lista de gifts y muestra cada uno en una fila de la tabla -->
            @foreach (session('gifts') as $gift)
            <tr>
                <td>{{ $gift->name }}</td>
                <td>{{ $gift->description }}</td>
                <td>{{ $gift->urlimage }}</td>
                <td>
                @if ($gift->state == 1)
                            Pendiente por canjear
                        @elseif ($gift->state == 2)
                            Reclamado
                        @elseif ($gift->state == 3)
                            Canjeada
                        @elseif ($gift->state == 4)
                            Expirada
                        @elseif ($gift->state == 5)
                            Desactivada
                        @else
                            Estado desconocido
                        @endif
                </td>
                <td>{{ $gift->expirationDate }}</td>
                <!-- Agrega más columnas según los datos que quieras mostrar -->
            </tr>
            @endforeach
        </tbody>
    </table>
