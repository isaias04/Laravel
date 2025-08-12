@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
    <h1 class="mb-4 text-center">Producto: {{ $producto->nombre }}</h1>

    @if($producto->imagen)
        <div class="text-center mb-3">
            <img src="{{ asset('images/' . $producto->imagen) }}" alt="Imagen del producto" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
        </div>
    @endif

    <div class="mb-3 text-center">
        <p><strong>Cantidad:</strong> {{ $producto->cantidad }}</p>
        <p><strong>precio_total:</strong> ${{ number_format($producto->precio_total, 2) }}</p>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
@endsection


