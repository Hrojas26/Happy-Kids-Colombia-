<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <table id="bonosFull">
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
                            @foreach($donationes as $donationD)
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
                                            <option value="en_recogida" >En recogida</option>
                                            <option value="en_proceso_administrativo" >En proceso administrativo</option>
                                            <option value="en_proceso_entrega" >En proceso entrega</option>
                                            <option value="entregado" >Entregado</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div>
</div>
