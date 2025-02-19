<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h1>Iniciar Sesión</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Iniciar Sesión</button>
        </form>
    </div>
@endsection
