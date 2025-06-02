@extends('layout')

@section('title', 'Detalles de la Reserva')

@section('content')
    <!-- Hero -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">RESERVA REALIZADA</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Reserva de Mesa > Reserva nº: {{ $reservation->id }}</p>
            <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">¡Te esperamos con ansias!</p>
        </div>
    </section>

    <!-- Detalles -->
    <section class="bg-gray-300 py-16">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-gray-50 p-8 rounded-2xl shadow-xl animate-fade-in-up transition-all duration-700">
                <h2 class="text-3xl font-bold text-blue-800 font-techno mb-6 text-center">Detalles de tu Reserva</h2>

                <div class="grid md:grid-cols-2 gap-6 text-gray-700 font-medium">
                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Nombre:</span>
                        <span>{{ $reservation->name }} {{ $reservation->surname }}</span>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Correo:</span>
                        <span>{{ $reservation->email }}</span>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Teléfono:</span>
                        <span>{{ $reservation->phone }}</span>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Fecha:</span>
                        <span>{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</span>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Hora:</span>
                        <span>{{ $reservation->hour }}</span>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <span class="text-blue-700 font-semibold">Nº de personas:</span>
                        <span>{{ $reservation->number_people }}</span>
                    </div>

                    @if ($reservation->message)
                        <div class="md:col-span-2 flex flex-col space-y-1">
                            <span class="text-blue-700 font-semibold">Mensaje adicional:</span>
                            <span class="italic text-gray-600">{{ $reservation->message }}</span>
                        </div>
                    @endif
                </div>

                <!-- Botones -->
                <div class="mt-10 flex flex-wrap justify-center gap-4 animate-fade-in-up delay-300">
                    <a href="{{ route('home') }}"
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                        Volver al Inicio
                    </a>
                    <a href="{{ route('reservations.create') }}"
                       class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-300 transform hover:scale-105">
                        Realizar otra Reserva
                    </a>
                    @auth
                        <a href="{{ route('reservations.user') }}"
                           class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                            Mis Reservas
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

@endpush
