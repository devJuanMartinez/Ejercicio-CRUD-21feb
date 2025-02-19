<!-- resources/views/productos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
@endsection
