@extends('layout')

@section('title', 'Registro')

@section('content')
    <div id="vanta-bg" class="relative min-h-screen w-full overflow-hidden text-white">

        <!-- Capa oscura encima del fondo animado -->
        <div class="absolute inset-0 bg-black/50 z-10"></div>

        <!-- Formulario encima del fondo -->
        <div class="relative z-20 flex items-center justify-center min-h-screen px-4 py-12">
            <div id="signup-card" class="bg-white bg-opacity-90 p-8 rounded-lg shadow-md w-full max-w-md">
                <div class="text-center mb-4">
                    <h1 class="text-2xl font-bold text-center text-blue-800 font-techno glow-blue mb-7">Registro de Usuario
                    </h1>
                    <div class="flex flex-col items-center mb-6">
                        <img src="/img/logo.png" alt="Logo Labburger" class="h-23 mb-2">
                        <p class="text-gray-600 italic mt-2">¡Únete a nuestra comunidad y descubre las hamburguesas más
                            sabrosas!
                        </p>
                    </div>
                </div>


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
                        <label for="name" class="block text-blue-700 font-semibold font-techno">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                    </div>

                    <div>
                        <label for="surname" class="block text-blue-700 font-semibold font-techno">Apellidos</label>
                        <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                            class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                    </div>

                    <div>
                        <label for="phone" class="block text-blue-700 font-semibold font-techno">Teléfono</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                    </div>

                    <div>
                        <label for="email" class="block text-blue-700 font-semibold font-techno">Correo
                            Electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                    </div>

                    <div>
                        <label for="password" class="block text-blue-700 font-semibold font-techno">Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                            <span id="togglePassword"
                                class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                                👁️
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-blue-700 font-semibold font-techno">Repetir
                            Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-4 py-1 mt-1 border-1 border-gray-400 rounded-lg text-black
                            focus:outline-none focus:ring-2 focus:ring-blue-500
                            hover:border-blue-500 transition-all duration-150">
                            <span id="togglePasswordConfirm"
                                class="absolute right-3 top-3 cursor-pointer text-gray-600 hover:text-blue-600">
                                👁️
                            </span>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 font-techno">
                            Registrarse
                        </button>
                    </div>

                    <div class="text-center mt-4 text-sm text-gray-600">
                        ¿Ya tienes una cuenta? <a href="{{ route('loginForm') }}"
                            class="text-blue-600 hover:underline">Inicia sesión aquí</a><br>
                        <a href="{{ route('home') }}" class="text-blue-600 hover:underline mt-1 inline-block">Volver al
                            inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/signup.js') }}"></script>
@endpush
