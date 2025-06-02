@extends('layout')

@section('title', 'Perfil')

@section('content')
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text">MI PERFIL</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno">Inicio > Mi Perfil</p>
        </div>
    </section>

    <section class="py-16 bg-gray-300 min-h-screen">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg flex">

            <!-- Menú lateral -->
            <div class="w-1/4 border-r p-8 flex flex-col items-center space-y-10">
                <div id="logoContainer" class="relative w-[80px] h-[80px] cursor-pointer">
                    <img src="/img/logo.png" alt="Logo Labburger" class="absolute inset-0 w-full h-full object-contain m-auto" />
                </div>

                <nav class="w-full">
                    <ul class="space-y-4 text-center text-lg font-semibold font-techno">
                        <li>
                            <button class="w-full py-3 rounded-lg bg-blue-700 text-white shadow transition hover:bg-blue-800 font-techno">
                                Mi perfil
                            </button>
                        </li>
                        <li>
                            <a href="{{ route('orders.user') }}" class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-blue-200 text-blue-800 shadow transition">
                                Mis pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reservations.user') }}" class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-blue-200 text-blue-700 shadow transition">
                                Mis reservas
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Formulario de perfil -->
            <div class="w-3/4 p-10 relative">
                <h2
                    class="text-4xl font-bold text-blue-800 mb-10 animate-fade-in-down transition duration-700 font-techno glow-blue">
                    Mi perfil</h2>

                <!-- Botón editar -->
                <button id="editBtn"
                    class="absolute top-10 right-10 bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-900 transition font-techno">
                    Editar
                </button>

                <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data" class="space-y-10"
                    id="profileForm">
                    @csrf

                    <!-- Avatar -->
                    <div class="flex justify-center mb-10 relative">
                        <div class="relative w-32 h-32">
                            <img src="{{ $user->avatar }}" alt="Avatar"
                                class="rounded-full w-full h-full object-cover border">
                            <label for="avatar" id="avatarEditIcon" class="absolute bottom-0 right-0 bg-blue-700 text-white p-2 rounded-full cursor-pointer hidden transition transform hover:scale-110 hover:rotate-6">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9" />
                                    <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                </svg>
                            </label>
                            <input id="avatar" name="avatar" type="file" class="hidden" accept="image/*" disabled>
                        </div>
                    </div>

                    <!-- Datos -->
                    <div class="space-y-6">

                        <div class="flex items-center">
                            <label class="w-48 font-semibold">Nombre</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="flex-1 bg-gray-100 rounded px-4 py-2 transition-all duration-300" disabled>
                        </div>

                        <div class="flex items-center">
                            <label class="w-48 font-semibold">Apellidos</label>
                            <input type="text" name="surname" value="{{ old('surname', $user->surname) }}"
                                class="flex-1 bg-gray-100 rounded px-4 py-2 transition-all duration-300" disabled>
                        </div>

                        <div class="flex items-center">
                            <label class="w-48 font-semibold">Teléfono</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="flex-1 bg-gray-100 rounded px-4 py-2 transition-all duration-300" disabled>
                        </div>

                        <div class="flex items-center">
                            <label class="w-48 font-semibold">Correo electrónico</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="flex-1 bg-gray-100 rounded px-4 py-2 transition-all duration-300" disabled>
                        </div>

                    </div>

                    <!-- Botón guardar -->
                    <div class="mt-10 text-center hidden" id="saveBtnContainer">
                        <button type="submit"
                            class="bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-900 transition transform hover:scale-105">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/user.js') }}"></script>
@endpush
