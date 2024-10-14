<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación de Juguetes</title>
    <style>
        .background-donar {
            background: linear-gradient(135deg, #ab08d4, #e06adc);
        }
        .card {
            border-radius: 10px; /* Esquinas redondeadas */
        }
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%; /* Altura completa de la columna */
            padding: 20px; /* Espaciado interno */
        }
        .img-container img {
            max-width: 2000px;
            height: 764px;
            top: 86px;
            left: 4px;
            position: absolute;
            z-index: 0;
        }
        .form-group {
            margin-bottom: 20px; /* Espacio entre grupos de formulario */
        }
        button {
            margin-top: 20px; /* Espacio antes del botón */
        }
    </style>
</head>
<body class="background-donar">
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 img-container">
                <img src="{{ asset('img/ninoColumpio.png') }}" alt="Donación de Juguetes" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="alert alert-primary fs-14" role="alert">
                    ¡No olvides que puedes donar uno o más juguetes! Sin embargo, para poder reclamar un bono, es necesario que dones al menos 10 juguetes. <strong> <br> CONSEJO: las donaciones son acumulables. </strong>
                  </div>
                <div class="card">
                    <div class="card-header text-center">DONA UN JUGUETE</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('donaciones.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="numberToys">¿Cuántos juguetes vas a donar?</label>
                                <input id="numberToys" type="number" class="form-control" name="numberToys" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="observations">¿Qué vas a donar?</label>
                                <input id="observations" type="text" class="form-control" name="observations" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Dirección donde recogeremos los juguetes</label>
                                <input id="address" type="text" class="form-control" name="address" required autofocus>
                            </div>
                                                        
                            <div class="form-group">
                                <label for="timeCollection">Hora de recolección (entre 9:00 a. m. y 6:00 p. m.)</label>
                                <input id="timeCollection" type="time" class="form-control" name="timeCollection" required min="09:00" max="18:00">
                            </div>
                            
                            <div class="form-group">
                                <label for="dateCollection">Fecha</label>
                                <input id="dateCollection" type="date" class="form-control" name="dateCollection" required>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-hkc w-100">DONAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
