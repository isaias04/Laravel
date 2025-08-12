<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Login')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <style>
    .gradient-custom-2 {
        background-image: url('/images/login-bg.png');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .gradient-custom-2::before {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 50, 0.5); /* azul oscuro transparente */
        z-index: 1;
    }

.gradient-custom-2 > div {
  position: relative;
  z-index: 2;
}


    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
    @keyframes fadeSlideIn {
  0% {
    opacity: 0;
    transform: translateX(50px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-slide-in {
  animation: fadeSlideIn 1s ease-out forwards;
}


  </style>
</head>
<body>
  @yield('content')

  <!-- Bootstrap JS (opcional si usas componentes interactivos) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>