<h3 class="mb-3">Bonos reclamados</h3>
@if (isset($gifts) && $gifts !== '')
    <table class="table" id="bonos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Codigo del bono</th>
                <th>Fecha de vencimiento</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <td>{{ $gift->name }}</td>
                    <td>{{ $gift->description }}</td>
                    <td>{{ $gift->codigobono }}</td>
                    <td>{{ $gift->expirationDate }}</td>
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
                    </td>                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@if (isset($message) && $message !== null)
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@endif
