<div>
    <h2 class="mb-3">Estado de Mis Donaciones</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Fecha de recolección</th>
                <th>Hora de recolección</th>
                <th>Número de juguetes</th>
                <th>Observaciones</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $donation)
                <tr class="rowDonation" onclick="selectRowState('<?php echo $donation->stateDonation->status; ?>')">
                    <td>{{ $donation->id }}</td>
                    <td>{{ $donation->address }}</td>
                    <td>{{ $donation->dateCollection }}</td>
                    <td>{{ $donation->timeCollection }}</td>
                    <td>{{ $donation->numberToys }}</td>
                    <td>{{ $donation->observations }}</td>
                    <td>{{ $donation->stateDonation->status }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-toys">
        <h3>🧸 Total de Juguetes Donados: {{ $totalToys }}</h3>
        <h3>🎁 Cantidad de Juguetes entregados por Happy Kids Colombia: {{ $deliveredDonationsCount }}</h3>
    </div>
</div>
<script>
    function selectRowState(state) {
        const enrecogida = document.getElementById('en_recogida')
        const enprocesoadministrativo = document.getElementById('en_proceso_administrativo')
        const enprocesoentrega = document.getElementById('en_proceso_entrega')
        const entregado = document.getElementById('entregado')

        enrecogida.classList.remove("bg-danger")
        enprocesoadministrativo.classList.remove("bg-danger")
        enprocesoentrega.classList.remove("bg-danger")
        entregado.classList.remove("bg-danger")

        const currentStatus = document.getElementById(state)
        if (state == 'en_recogida') {
            enrecogida.classList.add("bg-danger")
            enprocesoadministrativo.classList.remove("bg-danger")
            enprocesoentrega.classList.remove("bg-danger")
            entregado.classList.remove("bg-danger")
        } else if (state == 'en_proceso_administrativo') {
            enrecogida.classList.add("bg-danger")
            enprocesoadministrativo.classList.add("bg-danger")
            enprocesoentrega.classList.remove("bg-danger")
            entregado.classList.remove("bg-danger")
        } else if (state == 'en_proceso_entrega') {
            enrecogida.classList.add("bg-danger")
            enprocesoadministrativo.classList.add("bg-danger")
            enprocesoentrega.classList.add("bg-danger")
            entregado.classList.remove("bg-danger")
        } else if (state == 'entregado') {
            enrecogida.classList.add("bg-danger")
            enprocesoadministrativo.classList.add("bg-danger")
            enprocesoentrega.classList.add("bg-danger")
            entregado.classList.add("bg-danger")
        }

    }
</script>
