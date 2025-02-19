@extends('layouts.app')

@section('content')
    <h2>Crear una cuenta</h2>

    <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    </form>


    <p class="mt-3">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
@endsection
