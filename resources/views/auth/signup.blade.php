@extends('layout')

@section('title', 'Registro')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
    <div id="signup-card" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md opacity-0 translate-y-10 transition-all duration-700">

        <div class="text-center mb-4">
            <div class="text-3xl font-bold text-red-600">LABBURGER</div>
            <p class="text-gray-600 italic mt-2">¡Únete a nuestra comunidad y descubre las hamburguesas más sabrosas!</p>
        </div>

        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Registro de Usuario</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup') }}" method="post" class="space-y-4" id="signup-form">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-semibold">Nombre Completo</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="surname" class="block text-gray-700 font-semibold">Apellidos</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-semibold">Teléfono</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span id="togglePassword" class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                        👁️
                    </span>
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Repetir Contraseña</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span id="togglePasswordConfirm" class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                        👁️
                    </span>
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Registrarse
                </button>
            </div>

            <div class="text-center mt-4 text-sm text-gray-600">
                ¿Ya tienes una cuenta? <a href="{{ route('loginForm') }}" class="text-blue-600 hover:underline">Inicia sesión aquí</a><br>
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline mt-1 inline-block">Volver al inicio</a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/signup.js') }}"></script>
@endpush
