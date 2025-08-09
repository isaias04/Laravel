<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Listado de Productos</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear nuevo producto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Unidad de Medida</th>
                <th>Precio</th>
                <th>Precio Unitario</th>
                <th>Precio Mayoreo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td class="align-middle text-start">{{ $producto->id }}</td>
                <td class="align-middle text-start">{{ $producto->nombre }}</td>
                <td class="align-middle text-start">{{ $producto->cantidad }}</td>
                <td class="align-middle text-start">{{ ucfirst($producto->unidad_medida) }}</td>
                <td class="align-middle text-start">${{ number_format($producto->precio, 2) }}</td>
                <td class="align-middle text-start">
                    @if($producto->precio_unitario)
                        ${{ number_format($producto->precio_unitario, 2) }}
                    @else
                        -
                    @endif
                </td>
                <td class="align-middle text-start">
                    @if($producto->precio_mayoreo)
                        ${{ number_format($producto->precio_mayoreo, 2) }}
                    @else
                        -
                    @endif
                </td>
                <td class="align-middle text-start">
                    @if($producto->imagen)
                        <img src="{{ asset('images/' . $producto->imagen) }}" alt="Imagen" style="max-width: 60px;">
                    @else
                        Sin imagen
                    @endif
                <td>
                    <div class="d-flex flex-column gap-2">
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    </div>
</td>

               
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $productos->links('pagination::bootstrap-5') }}
</div


<!-- Bootstrap 5 JS y Popper (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
