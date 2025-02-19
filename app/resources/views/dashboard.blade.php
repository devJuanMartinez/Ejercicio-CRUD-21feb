@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido al Dashboard, {{ $user->name }}</h1>
        <p>¡Has iniciado sesión correctamente!</p>
        <p>Tu rol es: {{ $user->rol }}</p>

        @if($user->rol == 'admin')
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Tus Productos</a>
        <a href="{{ route('productos.admin') }}" class="btn btn-danger">Gestionar Todos los Productos</a>
        @else
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Tus Productos</a>
        <!-- <a href="{{ route('productos.list') }}" class="btn btn-primary">Ver productos</a> -->

        @endif


    </div>
@endsection

