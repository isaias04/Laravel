<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Autenticación')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<style>
         body {
            background-image: url('/images/login-bg.png');
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-wrapper {
            max-width: 1400px;
            width: 90vw;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 2rem;
        }

        .card-header {
            background-color: #4facfe;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 1.25rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .btn-primary {
            background-color: #4facfe;
            border-color: #4facfe;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #00c6ff;
            border-color: #00c6ff;
        }


</style>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="auth-wrapper">
        @yield('content')
    </div>
</body>

</html>