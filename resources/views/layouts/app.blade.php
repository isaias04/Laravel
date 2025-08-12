<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            background: #f8f9fa;
        }
        .centered-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .content-wrapper {
            width: 100%;
            max-width: 480px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .full-screen-container {
        min-height: 100vh; /* Ocupa toda la altura de la ventana */
        padding: 20px;
        background-color: #f8f9fa; /* Color de fondo opcional */
    }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('productos.index') }}">Inventario</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menú -->
            <!-- Barra de búsqueda -->
            @hasSection('search')
                @yield('search')
            @endif

            <!-- Usuario y autenticación -->
            @auth
                <div class="d-flex ms-auto align-items-center">
                    <a href="{{ route('productos.index') }}" class="text-white text-decoration-none me-3">
                        👤 {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="d-flex align-items-center ms-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success btn-sm">Registrarse</a>
                </div>
            @endguest
        </div>
    </div>
</nav>

<!-- Contenido -->
@if(View::getSection('fullwidth'))
    <div class="container-fluid full-screen-container">
        @yield('content')
    </div>
@else
    <div class="centered-container">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts') <!-- Esta línea permite que las vistas agreguen scripts -->

</body>
</html>