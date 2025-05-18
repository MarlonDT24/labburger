@extends('layout')

@section('title', 'Login')

@section('content')
    <!-- Video de fondo -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="/videos/fondovideo.mp4" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>

    <!-- Capa oscura encima del video -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <!-- Formulario -->
    <div class="relative z-20 flex items-center justify-center min-h-[calc(100vh-100px)] px-4 py-7">
        <div id="login-card"
            class="bg-blue-900 bg-opacity-90 p-8 rounded-lg border-4 border-white w-full max-w-md transition-all duration-700">
            <h1 class="text-2xl font-bold text-center text-white mb-3 font-techno glow-text">Iniciar Sesión</h1>

            <div class="flex flex-col items-center mb-4">
                <img src="/img/logowhite.png" alt="Logo Labburger" class="h-32 mb-5">
                <p class="text-white text-sm italic font-light text-center">¡Explora el sabor, una sesión a la vez!</p>
            </div>

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
                    <label for="email" class="block text-white font-semibold font-techno">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-white bg-white"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-white font-semibold font-techno">Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-white bg-white"
                            required>
                        <span id="togglePassword"
                            class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                            👁️
                        </span>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-md text-white">Recordar login</label>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-gray-400 hover:bg-white text-black font-semibold py-2 px-4 rounded-lg transition duration-200 font-techno">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
