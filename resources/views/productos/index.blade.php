@extends('layouts.app')

@section('fullwidth', true) {{-- Activar pantalla completa --}}

@section('title', 'Listado de Productos')

@section('content')
<div class="mt-4" >
    <h1 class="mb-4">Productos</h1>
    <!-- Barra de búsqueda -->
    <div class="mb-3" style="max-width: 400px;">
    <form class="d-flex" action="{{ route('productos.index') }}" method="GET">
        <input class="form-control me-2" 
               type="search" 
               name="search" 
               placeholder="Buscar producto..." 
               value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

    @if(request('search'))
        <a href="{{ route('productos.index') }}" class="btn btn-secondary" title="Ver todos los productos">
            volver 
        </a>
    @endif
</div>


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
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>{{ ucfirst($producto->unidad_medida) }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->precio_unitario ? '$'.number_format($producto->precio_unitario, 2) : '-' }}</td>
                <td>{{ $producto->precio_mayoreo ? '$'.number_format($producto->precio_mayoreo, 2) : '-' }}</td>
                <td>
                    @if($producto->imagen)
                        <img src="{{ asset('images/' . $producto->imagen) }}" alt="Imagen" style="max-width: 60px;">
                    @else
                        Sin imagen
                    @endif
                </td>
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

    <div class="d-flex justify-content-center mt-4">
        {{ $productos->appends(request()->only('search'))->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection


