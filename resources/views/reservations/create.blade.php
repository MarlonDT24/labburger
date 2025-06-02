@extends('layout')

@section('title', 'Reservas')

@section('content')
    <!-- Titular -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text">RESERVAS</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno">Inicio > Reservas</p>
            <p class="text-lg text-blue-200 italic mt-4">¡Reserva tu mesa y experimenta el sabor que rompe las leyes de la física!</p>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <!-- Calendario y contacto -->
            <div class="space-y-6">
                <h2 class="text-3xl text-center font-bold text-blue-800 font-techno">Disponibilidad</h2>

                <!-- Calendario -->
                <div id="calendar-container" class="bg-gray-100 items-center p-4 rounded-lg shadow-lg">
                    <div id="calendar" class="grid grid-cols-7 gap-2 text-center font-semibold text-sm text-gray-700"></div>

                    <div class="mt-4 text-sm">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 bg-green-500 rounded"></div> Disponible</div>
                        <div class="flex items-center gap-2"><div class="w-3 h-3 bg-red-500 rounded"></div> Ocupado</div>
                        <div class="flex items-center gap-2"><div class="w-3 h-3 bg-blue-500 rounded"></div> Hoy</div>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="mt-6 space-y-3">
                    <p class="font-bold text-lg text-blue-800">Llámanos</p>
                    <p class="text-2xl text-red-600 font-extrabold">+34 654 987 321</p>
                    <div class="flex gap-4">
                        <a href="#"><i class="fab fa-facebook text-blue-600 text-xl"></i></a>
                        <a href="#"><i class="fab fa-instagram text-pink-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-twitter text-sky-500 text-xl"></i></a>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <div id="reservation-form-wrapper" class="opacity-0 translate-y-6">
                <form method="POST" action="{{ route('reservations.store') }}" class="bg-gray-50 p-6 rounded-lg shadow-lg space-y-4">
                    @csrf
                    <h3 class="text-2xl font-bold text-blue-800 font-techno mb-2">Reserva tu mesa</h3>

                    <input name="name" type="text" placeholder="Nombre completo" class="input-style" value="{{ old('name', $user->name ?? '') }}">
                    <input name="surname" type="text" placeholder="Apellidos" class="input-style" value="{{ old('surname', $user->surname ?? '') }}">
                    <input name="email" type="email" placeholder="Correo electrónico" class="input-style" value="{{ old('email', $user->email ?? '') }}">
                    <input name="phone" type="tel" placeholder="Teléfono" class="input-style" value="{{ old('phone', $user->phone ?? '') }}">

                    <input name="date" id="reservation-date" type="text" placeholder="Fecha" class="input-style" readonly>
                    <input name="hour" id="reservation-time" type="text" placeholder="Hora" class="input-style" readonly>

                    <input name="number_people" type="number" placeholder="Nº de personas" class="input-style">
                    <textarea name="message" rows="3" placeholder="Mensaje adicional (opcional)" class="input-style"></textarea>

                    <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 rounded hover:bg-green-700 transition duration-300 ease-in-out">
                        Reservar Mesa
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Cargar los datos del calendario y las reservas ocupadas -->
    <script type="application/json" id="calendar-data">
        {!! json_encode($calendarData) !!}
    </script>
    <script type="application/json" id="reserved-slots">
    {!! json_encode($reservedSlots) !!}
    </script>
@endsection

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/reservation.js') }}"></script>
@endpush
