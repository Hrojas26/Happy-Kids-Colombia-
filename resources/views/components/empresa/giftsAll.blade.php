<h1 class="">Bonos creados</h1>
<p class="">Aquí se reflejarán todos los bonos creados para los donantes</p>

<table id="gifts-table" class="display">
    <thead>
        <tr>
            <th>Número</th>
            <th>Nombre del bono</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Estado del bono</th>
            <th>Fecha de creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @if ($gifts && $gifts->count() > 0)
            @foreach ($gifts as $gift)
                <tr data-gift-id="{{ $gift->id }}">
                    <td data-order="{{ $gift->id }}">
                        <span class="editable" data-field="id" data-id="{{ $gift->id }}">{{ $gift->id }}</span>
                    </td>
                    <!-- Aquí se añade el data-order -->
                    <td><span class="editable" data-field="name" data-id="{{ $gift->id }}">{{ $gift->name }}</span>
                    </td>
                    <td style="width: 150px;">
                        <span class="editable" data-field="description"
                            data-id="{{ $gift->id }}">{{ $gift->description }}</span>
                    </td>
                    <td>
                        <span class="editable" data-field="image">
                            <img src="{{ $gift->urlimage }}" alt="{{ $gift->name }}" style="width: 50px;">

                        </span>
                        <input type="file" id="image-{{ $gift->id }}" class="form-control edit-image"
                            style="display: none;" />
                    </td>
                    <td><span class="editable" data-field="state" data-id="{{ $gift->id }}">
                            @switch($gift->state)
                                @case(1)
                                    Pendiente por reclamar
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
                        </span>
                        <select id="state-{{ $gift->id }}" class="form-control edit-state" style="display: none;">
                            <option value="1">Pendiente por reclamar</option>
                            <option value="2">Reclamado</option>
                            <option value="3">Canjeada</option>
                            <option value="4">Expirada</option>
                            <option value="5">Desactivada</option>
                            <option value="6">Estado desconocido</option>
                        </select>
                    </td>
                    <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                    <td>
                        <button class="btn btn-hkc edit-gift" data-id="{{ $gift->id }}">Editar</button>
                        <button class="btn btn-success save-gift" style="display: none;"
                            data-id="{{ $gift->id }}">Guardar</button>
                        <button class="btn btn-danger delete-gift" style=""
                            data-id="{{ $gift->id }}">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No hay bonos disponibles.</td>
            </tr>
        @endif
    </tbody>
</table>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-gift').on('click', function() {
            var row = $(this).closest('tr');
            row.find('.editable').each(function() {
                var field = $(this).data('field');
                var value;
                if ($(this).is('span')) {
                    value = $(this).text().trim(); // Obtener el texto del span
                } else {
                    value = $(this).siblings('select')
                        .val().trim(); // Obtener el valor seleccionado del select

                }

                if (field === 'image') {
                    var image = row.find('.edit-image');
                    $(this).hide();
                    image.show();
                } else if (field === 'state') {
                    switch (value) {
                        case 'Pendiente por reclamar':
                            value = 1
                            break;
                        case 'Reclamado':
                            value = 2
                            break;
                        case 'Canjeada':
                            value = 3
                            break;
                        case 'Expirada':
                            value = 4
                            break;
                        case 'Desactivada':
                            value = 5
                            break;
                        case 'Estado desconocido':
                            value = 6
                            break;

                    }
                    var select = row.find('.edit-state');
                    select.val(value);
                    $(this).hide();
                    select.show();
                } else {
                    $(this).html('<input type="text" class="form-control" value="' + value +
                        '" data-field="' + field + '">');
                }
            });
            row.find('.edit-gift').hide();
            row.find('.save-gift').show();
        });
        $('.delete-gift').on('click', function() {
            var row = $(this).closest('tr');
            var data = {};
            var giftId = row.data('gift-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            data['_token'] = token;
            data['id'] = giftId;
            $.ajax({
                url: '/gifts-all/gifts/' + giftId,
                method: 'DELETE',
                data: data,
                success: function(response) {
                    if (response.success) {
                        location.reload()
                    }
                },
                error: function(xhr, status, error) {
                    // Manejar errores
                }

            });
        });
        $('.save-gift').on('click', function() {
            var row = $(this).closest('tr');
            var fdata = new FormData();
            var giftId = row.data('gift-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            fdata.append('_token', token);
            fdata.append('id', giftId);

            // Recorrer todos los elementos .editable dentro de la fila
            row.find('.editable').each(function() {
                var field = $(this).data('field');
                var value;

                // Obtener el valor del input o select dentro del span si existe, de lo contrario, obtener el texto del span
                var inputOrSelect = $(this).find('input, select, input');
                if (inputOrSelect.length > 0) {
                    value = inputOrSelect.val();
                } else {
                    value = $(this).text();
                }
                fdata.append(field, value)
            });

            var selectIdState = '#state-' +
                giftId; // Reemplaza "tuSelectId" con el ID real de tu select

            var selectedValueState = $(selectIdState)
                .val(); // Obtener el valor seleccionado del select

            var imageIdState = '#image-' +
                giftId; // Reemplaza "tuSelectId" con el ID real de tu select

            var imageValue = $(imageIdState)[0].files[0]
            // Obtener el valor seleccionado del select

            fdata.append('state', selectedValueState);
            fdata.append('image', imageValue);
            console.log("Datos enviados:", fdata);


            $.ajax({
                url: '{{ route('edit.gifts') }}',
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: fdata,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        location.reload()
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                    // Manejar errores
                }
            });
        });


        $('#gifts-table').DataTable({
            order: [
                [0, 'desc']
            ],
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay datos disponibles en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 ",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

    });
</script>
