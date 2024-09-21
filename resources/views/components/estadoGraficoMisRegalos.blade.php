<div class="w-100 row info-user ">

    <?php
    $state = '';
    foreach ($donationStatuses as $donationStatus) {
        if ($donationStatus->donation_id === $donations[$donations->count() - 1]->id) {
            $state = $donationStatus->status;
        }
    }
    ?>
 <h3 class="text center">Estado de Mis Donaciones</h3>
    <div class="d-flex  justify-content-center p-5">
        <div class="d-flex  justify-content-center w-75">
            @include('components.icons.enRecogida')
            @include('components.icons.arrowLeft')
            @include('components.icons.enProcesoAdministrativo')
            @include('components.icons.arrowLeft')
            @include('components.icons.enProcesoEntrega')
            @include('components.icons.arrowLeft')
            @include('components.icons.entregado')
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                selectRowState("<?php echo $state; ?>");
            });
        </script>

    </div>
