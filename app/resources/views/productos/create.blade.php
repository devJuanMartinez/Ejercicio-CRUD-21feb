<!-- resources/views/productos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
@endsection
