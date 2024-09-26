
    <h3 class="mb-3">Bonos reclamados</h3>

    @if ($userGifts->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Actualmente no tienes bonos reclamados, te invitamos a donar juguetes para que puedas reclamar uno
        </div>

        <button class="btn btn-hkc">Donar Ahora</button>
    @else
        <table class="table display" id="bonos">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Codigo del bono</th>
                    <th>Fecha de vencimiento</th>
                    <th>Estado</th>
                    <th>Dirección Empresa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userGifts as $giftUser)
                    <tr>
                        <td>{{ $giftUser->gift->name }}</td>
                        <td>{{ $giftUser->gift->description }}</td>
                        <td>{{ $giftUser->gift->codigobono }}</td>
                        <td>{{ $giftUser->gift->expirationDate }}</td>
                        <td>
                            @if ($giftUser->state == 1)
                                Pendiente por reclamar
                            @elseif ($giftUser->state == 2)
                                Reclamado
                            @elseif ($giftUser->state == 3)
                                Canjeada
                            @elseif ($giftUser->state == 4)
                                Expirada
                            @elseif ($giftUser->state == 5)
                                Desactivada
                            @else
                                Estado desconocido
                            @endif
                        </td>
                        <td>{{ $giftUser->gift->direccionEmpresa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

