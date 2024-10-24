<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Créditos y Pagos')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #a8c0ff, #3f2b96); /* Degradado suave de azul claro a azul oscuro */
            color: #333; /* Color del texto */
            height: 100vh; /* Altura completa de la ventana */
            margin: 0; /* Sin margen */
        }
        footer {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}"><i>Sistema de Gestión</i></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}"><i>Clientes</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('creditos.index') }}"><i>Créditos</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pagos.index') }}"><i>Pagos</i></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>
    
    <footer class="bg-light text-center py-3">
        <p>&copy; {{ date('Y') }} <i>Sistema de Gestión de Créditos y Pagos. Todos los derechos reservados.</i></p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>