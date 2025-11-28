<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestion de Computadores</title>

    {{-- CSS global --}}
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    {{-- Contenido del login --}}
    <div class="container" style="max-width: 420px;">
        @yield('contenido')
    </div>

</body>
</html>
