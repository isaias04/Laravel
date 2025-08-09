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

<div class="centered-container">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

</body>
</html>
