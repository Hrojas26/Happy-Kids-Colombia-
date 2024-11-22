<h1 class="mb-3 ps-3 text-center">Crea tu bono de descuento</h1>
<p class="ps-3 text-center">Aquí podrás crear un bono para que los donantes lo reclamen y luego lo canjeen. <strong><br>
        ¡Anímate y genera TRÁFICO en tu empresa a través de Happy Kids Colombia!</strong></p>

<hr>

<div class="container mt-5">
    <div class="row">
        <!-- Columna del formulario -->
        <div class="col-md-6">
            <form action="{{ route('crear.bono') }}" method="POST" enctype="multipart/form-data"
                class="p-4 border rounded shadow-sm">
                @csrf
                <!-- Nombre del bono -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre del bono de descuento</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        oninput="updatePreview()" autocomplete="off">
                </div>

                <!-- Imagen del bono -->
                <div class="mb-3">
                    <label for="urlimage" class="form-label fw-bold">Imagen del bono</label>
                    <input type="file" class="form-control" id="urlimage" name="urlimage" required
                        onchange="previewImage(event)" autocomplete="off">
                </div>

                <!-- Código de descuento -->
                <div class="mb-3">
                    <label for="codigoBono" class="form-label fw-bold">Código de descuento</label>
                    <p style="font-size:13px; font-style:italic;">Este código es exclusivo para que los donantes lo
                        utilicen en tu tienda. Recuerda que es único, así que no lo compartas con nadie.</p>
                    <input class="form-control" id="codigoBono" name="codigoBono" required oninput="updatePreview()"
                        autocomplete="off">
                </div>

                <!-- Descripción del bono -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Descripción del bono</label>
                    <input class="form-control" id="description" name="description" required oninput="updatePreview()"
                        autocomplete="off">
                </div>

                <!-- Fecha de expiración -->
                <div class="mb-3">
                    <label for="expirationDate" class="form-label fw-bold">Fecha de expiración del bono</label>
                    <input type="date" class="form-control" id="expirationDate" name="expirationDate" required
                        oninput="updatePreview()" autocomplete="off">
                </div>

                <!-- Dirección de la empresa -->
                <div class="mb-3">
                    <label for="direccionEmpresa" class="form-label fw-bold">Dirección de la empresa</label>
                    <input type="text" class="form-control" id="direccionEmpresa" name="direccionEmpresa" required
                        oninput="updatePreview()" autocomplete="off">
                </div>

                <!-- Botón de submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-hkc">¡Oprime aquí para crear este bono!</button>
                </div>
            </form>
        </div>
        <!-- Columna de la imagen -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h5>¡Así lucirá tu bono!</h5>
            <p class="text-center text-aligt-center">Aquí podrás ver en vivo cómo quedará tu bono al tiempo de que lo
                vayas creando. Empieza creando tu bono en la columna izquierda.</p>
            <div class="card bonostyle mt-3" style="width: 18rem;">
                <h5 class="card-title center pt-2 pb-2 TittleCard" id="previewName">Nombre del bono</h5>
                <div class="card-body">
                    <div class="row card-img">
                        <img id="previewImage" src="" class="img-fluid" alt="..." style="max-width: 100%;">
                    </div>
                    <p class="card-text" id="previewDescription">Por digitar...</p>
                    <p class="card-text" id="previewExpiration">Por digitar...</p>
                    <p class="card-text" id="previewAddress">Por digitar...</p>
                    <button class="btn btn-hkc w-100">Reclamar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("expirationDate").setAttribute("min", today);

    function updatePreview() {
        // Obtener los valores del formulario
        const name = document.getElementById('name').value || 'Nuevo campeón';
        const description = document.getElementById('description').value || 'Descripción del bono.';
        const expirationDate = document.getElementById('expirationDate').value ?
            `Fecha de expiración: ${document.getElementById('expirationDate').value}` : 'Fecha de expiración: ';
        const address = document.getElementById('direccionEmpresa').value || 'Dirección de la empresa: ';

        // Actualizar los elementos de vista previa
        document.getElementById('previewName').innerText = name;
        document.getElementById('previewDescription').innerText = description;
        document.getElementById('previewExpiration').innerText = expirationDate;
        document.getElementById('previewAddress').innerText = address;
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
