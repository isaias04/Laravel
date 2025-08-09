@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<h1 class="mb-4 text-center">Crear Nuevo Producto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hay problemas con los datos ingresados:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
    </div>

    <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de Medida:</label>
        <select id="unidad_medida" name="unidad_medida" class="form-select" required>
            <option value="">-- Selecciona una unidad --</option>
            <option value="unidad" {{ old('unidad_medida') == 'unidad' ? 'selected' : '' }}>Unidad</option>
            <option value="libra" {{ old('unidad_medida') == 'lb' ? 'selected' : '' }}>Libra</option>
            <option value="arroba" {{ old('unidad_medida') == '@' ? 'selected' : '' }}>Arroba</option>
            <option value="quintal" {{ old('unidad_medida') == 'quintal' ? 'selected' : '' }}>Quintal</option>
            <option value="pieza" {{ old('unidad_medida') == 'pieza' ? 'selected' : '' }}>Pieza</option>
            <option value="caja" {{ old('unidad_medida') == 'caja' ? 'selected' : '' }}>Caja</option>
            <option value="docena" {{ old('unidad_medida') == 'docena' ? 'selected' : '' }}>Docena</option>
            <option value="kg" {{ old('unidad_medida') == 'kg' ? 'selected' : '' }}>Kilogramo (kg)</option>
            <option value="litro" {{ old('unidad_medida') == 'litro' ? 'selected' : '' }}>Litro</option>
            <option value="metro" {{ old('unidad_medida') == 'metro' ? 'selected' : '' }}>Metro</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio') }}" required>
    </div>

    <div class="mb-3">
        <label for="precio_unitario" class="form-label">Precio Unitario:</label>
        <input type="text" id="precio_unitario" name="precio_unitario" class="form-control" value="{{ old('precio_unitario') }}">
    </div>

    <div class="mb-3">
        <label for="precio_mayoreo" class="form-label">Precio por Mayoreo:</label>
        <input type="text" id="precio_mayoreo" name="precio_mayoreo" class="form-control" value="{{ old('precio_mayoreo') }}">
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary ms-2">Volver al listado</a>
</form>
@endsection



