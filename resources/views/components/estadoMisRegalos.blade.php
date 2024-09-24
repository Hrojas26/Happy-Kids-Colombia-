<div>
    <h3 class="container-fluid text-center" >Mis donaciones</h3>
    <p class="text-center mb-3" >Selecciona cualquiera de tus donaciones en la siguiente tabla para consultar el que estado se encuentra.</p>


    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Fecha de recolección</th>
                <th>Hora de recolección</th>
                <th>Número de juguetes</th>
                <th>Observaciones</th>

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


                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container total-toys text-center col-12">
        <h3 class="my-4">Impacto de tus donaciones</h3>
        <h3 class="m-3 impacto " >Hasta el momento has donado <strong>{{ $totalToys }}</strong> juguetes y hemos entregado <strong>{{ $deliveredDonationsCount }}</strong></h3>
    </div>
</div>
<script>
    function selectRowState(state) {
        const enrecogida = document.getElementById('en_recogida')
        const enprocesoadministrativo = document.getElementById('en_proceso_administrativo')
        const enprocesoentrega = document.getElementById('en_proceso_entrega')
        const entregado = document.getElementById('entregado')

        enrecogida.classList.remove("bg-donacion")
        enprocesoadministrativo.classList.remove("bg-donacion")
        enprocesoentrega.classList.remove("bg-donacion")
        entregado.classList.remove("bg-donacion")

        const currentStatus = document.getElementById(state)
        if (state == 'en_recogida') {
            enrecogida.classList.add("bg-donacion")
            enprocesoadministrativo.classList.remove("bg-donacion")
            enprocesoentrega.classList.remove("bg-donacion")
            entregado.classList.remove("bg-donacion")
        } else if (state == 'en_proceso_administrativo') {
            enrecogida.classList.add("bg-donacion")
            enprocesoadministrativo.classList.add("bg-donacion")
            enprocesoentrega.classList.remove("bg-donacion")
            entregado.classList.remove("bg-donacion")
        } else if (state == 'en_proceso_entrega') {
            enrecogida.classList.add("bg-donacion")
            enprocesoadministrativo.classList.add("bg-donacion")
            enprocesoentrega.classList.add("bg-donacion")
            entregado.classList.remove("bg-donacion")
        } else if (state == 'entregado') {
            enrecogida.classList.add("bg-donacion")
            enprocesoadministrativo.classList.add("bg-donacion")
            enprocesoentrega.classList.add("bg-donacion")
            entregado.classList.add("bg-donacion")
        }

    }
</script>
