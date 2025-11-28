<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Computadores</title>

    <!-- Bootstrap (opcional pero recomendado) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>

    <!-- NAVBAR / MENÚ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Gestión de Computadores
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#menu" aria-controls="menu" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            {{-- Menú visible solo si el usuario está autenticado --}}
            @auth
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('computadores.index') }}">
                            Computadores
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipos.index') }}">
                            Tipos de Computador
                        </a>
                    </li>

                    {{-- Botón de Cerrar Sesión --}}
                    <li class="nav-item">
                       
                    </li>

                </ul>
            @endauth

        </div>
    </div>
</nav>


    <!-- CONTENIDO -->
    <div class="container">
        @yield('contenido')
    </div>

    

</body>
</html>

