<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido al Dashboard, {{ $user->name }}</h1>
        <!-- <p>¡Has iniciado sesión correctamente!, {{ $user->name }}. Tu rol es: {{ $user->rol }}</p> -->
        <p>¡Has iniciado sesión correctamente!</p>
        <p>Tu rol es: {{ $user->rol }}</p>

        @if($user->rol == 'admin')
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Ver Posts</a>
        @else
            <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
        @endif

    </div>
@endsection

