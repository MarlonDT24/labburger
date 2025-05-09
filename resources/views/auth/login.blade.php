@extends('layout')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
    <div id="login-card" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md opacity-0 translate-y-10 transition-all duration-700">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar Sesión</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="post" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                    <span id="togglePassword" class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                        👁️
                    </span>
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-600">Recordar login</label>
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
