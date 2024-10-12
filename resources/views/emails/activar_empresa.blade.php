<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de Empresa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; 
            text-align: center; /* Centra el texto */
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centra el contenido dentro del contenedor */
        }
        .logo {
            max-width: 84px; /* Ajusta el tamaño del logo */
            margin: 0 auto; /* Centra el logo */
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-hkc {
        color: #ffffff !important;
        background: #A672D8;
        padding: 10px;
        border-radius: 4px;
        width: 97%;
        }
        .btn-hkc:hover {
        color: #ffffff;
        background: #9249d6;
        padding: 10px;
        border-radius: 4px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Activar Empresa</h1>
        <p>Buen día administrador, la empresa <strong>{{ $nombreEmpresa }} </strong> se ha registrado y debe ser confirmada.</p>
        <p>Por favor, ve a tu dashboard y actívala. De lo contrario, ignora este mensaje.</p>
        <a href="{{ url('/dashboard') }}" class="btn btn-hkc">Activar</a> <!-- Enlace al dashboard -->
        <div class="footer">
            &copy; {{ date('Y') }} Happy Kids Colombia.
        </div>
    </div>
</body>
</html>
