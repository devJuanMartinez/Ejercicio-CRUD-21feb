<!-- resources/views/productos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Mis Productos</h1>
    <a href="{{ route('productos.create') }}">Crear Producto</a>

    <ul>
        @foreach ($productos as $producto)
            <li>{{ $producto->nombre }} - <a href="{{ route('productos.edit', $producto) }}">Editar</a> | 
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
