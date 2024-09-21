<table id="user-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr data-user-id="{{ $user->id }}">
        <td><span class="editable" data-field="name" data-id="{{ $user->id }}">{{ $user->name }}</span></td>
        <td><span class="editable" data-field="email" data-id="{{ $user->id }}">{{ $user->email }}</span></td>
        <td>
                <span class="editable" data-field="state" data-id="{{ $user->id }}">{{ $user->state == 1 ? 'Activado' : 'Desactivado' }}</span>
                <select id="state-{{ $user->id }}" class="form-control edit-state" style="display: none;">
                    <option value="1" >Activado</option>
                    <option value="0">Desactivado</option>
                </select>
            </td>
            <td>
                <span class="editable" data-field="rol" data-id="{{ $user->id }}">{{ $user->rol }}</span>
                <select id="rol-{{ $user->id }}" class="form-control edit-rol" style="display: none;">
                    <option value="persona" {{ $user->rol == 'persona' ? 'selected' : '' }}>Persona</option>
                    <option value="empresa" {{ $user->rol == 'empresa' ? 'selected' : '' }}>Empresa</option>
                    <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </td>
            <td>
                <button class="btn btn-hkc edit-user" data-id="{{ $user->id }}">Editar</button>
                <button class="btn btn-success save-user" style="display: none;" data-id="{{ $user->id }}">Guardar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<label for="miSelect">Selecciona una opción:</label>
    <select id="miSelect">
        <option value="opcion1">Opción 1</option>
        <option value="opcion2">Opción 2</option>
        <option value="opcion3">Opción 3</option>
    </select>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.edit-user').on('click', function() {
    var row = $(this).closest('tr');
    row.find('.editable').each(function() {
        var field = $(this).data('field');
        var value;
        if ($(this).is('span')) {
            value = $(this).text(); // Obtener el texto del span
        } else {
            value = $(this).siblings('select').val(); // Obtener el valor seleccionado del select
        }
        if (field === 'state') {
            var select = row.find('.edit-state');
            select.val(value);
            $(this).hide();
            select.show();
        } else if (field === 'rol') {
            var select = row.find('.edit-rol');
            select.val(value);
            $(this).hide();
            select.show();
        } else {
            $(this).html('<input type="text" class="form-control" value="' + value + '" data-field="' + field + '">');
        }
    });
    row.find('.edit-user').hide();
    row.find('.save-user').show();
});


    $('.save-user').on('click', function() {
        var row = $(this).closest('tr');
        var data = {};
        var userId = row.find('.editable').data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        data['_token'] = token;
        data['id'] = userId;

        // Recorrer todos los elementos .editable dentro de la fila
        row.find('.editable').each(function() {
            var field = $(this).data('field');
            var value;

            // Obtener el valor del input o select dentro del span si existe, de lo contrario, obtener el texto del span
            var inputOrSelect = $(this).find('input, select');
            if (inputOrSelect.length > 0) {
                value = inputOrSelect.val();
            } else {
                value = $(this).text();
            }

            data[field] = value;
        });

        var userId = data['id'];
        var selectIdState = '#state-'+userId; // Reemplaza "tuSelectId" con el ID real de tu select
        var selectIdRol = '#rol-'+userId; // Reemplaza "tuSelectId" con el ID real de tu select
        var selectedValueState = $(selectIdState).val(); // Obtener el valor seleccionado del select
        var selectedValueRol = $(selectIdRol).val(); // Obtener el valor seleccionado del select
        data.state=selectedValueState;
        data.rol=selectedValueRol;
        console.log("Datos enviados:", data);

        $.ajax({
            url: '{{ route("edit.user") }}',
            method: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    var users = response.users; // Ahora la respuesta contiene todos los usuarios actualizados
                    users.forEach(function(user) {
                        var row = $('tr[data-user-id="' + user.id + '"]'); // Buscar la fila correspondiente al usuario
                        console.log(row);
                        row.find('.editable').each(function() {
                            var field = $(this).data('field');
                            if (field === 'state') {
                                $(this).text(user[field] == 1 ? 'Activado' : 'Desactivado');
                            } else {
                                $(this).text(user[field]);
                            }
                        });
                    });
                    row.find('input, select').hide();
                    row.find('span.editable').show();
                    row.find('.edit-user').show();
                    row.find('.save-user').hide();
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
});

</script>
