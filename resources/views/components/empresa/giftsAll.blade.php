 <h1>Gifts Table</h1>
    <table id="gifts-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>URL Image</th>
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
                <!-- Agrega más columnas según los datos que quieras mostrar -->
            </tr>
            @endforeach
        </tbody>
    </table>
