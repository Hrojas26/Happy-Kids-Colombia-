<h3>Hola, {{ Auth::user()->name }}. Aquí puedes actualizar tu contraseña.</h3>
<div>
    <p>Nombre: {{ Auth::user()->name }}</p>
    <p>Correo Electrónico: {{ Auth::user()->email }}</p>
    <button class="btn btn-hkc" id="update-password-btn">Actualizar contraseña</button>
</div>

<div id="update-password-container" style="display: none;">
    <form method="POST" action="{{route('update.password')}}">
        @csrf

        <!-- Campo de nombre de usuario visible pero oculto con CSS para accesibilidad -->
        <div style="position: absolute; left: -9999px;">
            <label for="username">Nombre de usuario</label>
            <input type="text" id="username" name="username" value="{{ Auth::user()->email }}" autocomplete="username">
        </div>

        <div class="form-group">
            <label for="current_password">Contraseña actual</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required autocomplete="current-password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="new_password">Nueva contraseña</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required autocomplete="new-password">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Confirmar nueva contraseña</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-hkc my-3">Actualizar contraseña</button>
    </form>
</div>

@if (session()->has('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    <script>
        // Ocultar el mensaje de éxito después de 30 segundos
        setTimeout(function() {
            document.getElementById('success-alert').classList.add('d-none');
        }, 30000); // 30 segundos en milisegundos
    </script>
@endif

<script>
    var isUpdatePasswordVisible = false;
    document.getElementById('update-password-btn').addEventListener('click', function() {
        // Alternar la visibilidad del contenedor del componente updatePasswordUser
        isUpdatePasswordVisible = !isUpdatePasswordVisible;
        document.getElementById('update-password-container').style.display = isUpdatePasswordVisible ? 'block' : 'none';
    });
</script>
