@extends('layout')

@section('title', 'Registro')

@section('content')
<div class="container">
    <h1 class="mb-4">Registro de usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signup') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Apellidos:</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Repita la Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-transition btn-primary">Registrarse</button>
    </form>
</div>
@endsection
