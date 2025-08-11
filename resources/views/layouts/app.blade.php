<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            background: #f8f9fa; /* color suave de fondo */
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
    </style>
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productos.create') }}">Nuevo Producto</a>
                </li>
            </ul>

            <!-- Barra de búsqueda -->
             @hasSection('search')
                @yield('search')
            @endif
        </div>
    </div>
</nav>

@if(View::getSection('fullwidth'))
    {{-- Modo pantalla completa --}}
    <div class="container-fluid">
        @yield('content')
    </div>
@else
    {{-- Modo centrado (formularios, etc.) --}}
    <div class="centered-container">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
@endif
</body>
</html>
