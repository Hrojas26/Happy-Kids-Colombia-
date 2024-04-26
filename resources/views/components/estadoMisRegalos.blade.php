
    <div>
        <h2>Estado de Mis Donaciones</h2>
        <table class="table">
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
            <tr>
                <td>{{ $donation->id }}</td>
                <td>{{ $donation->address }}</td>
                <td>{{ $donation->dateCollection }}</td>
                <td>{{ $donation->timeCollection }}</td>
                <td>{{ $donation->numberToys }}</td>
                <td>{{ $donation->observations }}</td>
                <td>
                @foreach ($donationStatuses as $donationStatus)
                    @if ($donationStatus->donation_id === $donation->id)
                        {{ $donationStatus->status }}
                    @endif
                @endforeach
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="total-toys">
    <h3>Total de Juguetes Donados: {{ $totalToys }}</h3>
    <h3>Cantidad de Regalos Entregados: {{ $deliveredDonationsCount }}</h3>
</div>
    </div>

