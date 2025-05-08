@extends('layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email: </label><br>
        <input type="text" name="email" id="email" value="{{ old('email') }}"><br>

        <label for="password">Contraseña: </label><br>
        <input type="password" name="password" id="password"><br>

        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recordar login</label>
        <br>

        <input type="submit" class="btn btn-transition btn-primary" value="Iniciar Sesión">
    </form>
@endsection
