@extends('layout')

@section('title', 'Mis Reservas')

@section('content')
<!-- Hero -->
<section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div class="max-w-7xl mx-auto px-4 text-left">
        <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">MIS RESERVAS</h1>
        <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Mis Reservas</p>
        <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">Aquí puedes consultar todas tus reservas de forma detallada.</p>
    </div>
</section>

<section class="py-16 bg-gray-300">
    <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg flex">
        <!-- Menú lateral -->
            <div class="w-1/4 border-r p-8 flex flex-col items-center space-y-10">
                <div id="logoContainer" class="relative w-[80px] h-[80px] cursor-pointer">
                    <img src="/img/logo.png" alt="Logo Labburger"
                        class="absolute inset-0 w-full h-full object-contain m-auto" />
                </div>

                <nav class="w-full">
                    <ul class="space-y-4 text-center text-lg font-semibold font-techno">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-gray-300 text-blue-800 shadow transition text-center">
                                Mi perfil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders.user') }}"
                                class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-gray-300 text-blue-800 shadow transition  text-center">
                                Mis pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reservations.user') }}"
                                class="block w-full py-3 rounded-lg bg-blue-700 text-white shadow transition text-center">
                                Mis reservas
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        <div class="w-3/4 p-10 bg-blue-800 flex flex-col md:flex-row gap-8">
            <!-- Card Usuario -->
            <div class="w-full md:w-1/3 bg-white rounded-lg shadow-md p-6 text-center">
                <div class="flex justify-center mb-4">
                    <img src="{{ Auth::user()->avatar ?? '/img/default-avatar.png' }}"
                        class="w-24 h-24 rounded-full object-cover border">
                </div>
                <h3 class="text-xl font-bold">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                <p class="text-gray-600 text-sm mt-2"><strong>Correo Electrónico:</strong> {{ Auth::user()->email }}</p>
                <p class="text-gray-600 text-sm"><strong>Teléfono:</strong> {{ Auth::user()->phone }}</p>
                <a href="{{ route('users.index') }}"
                    class="mt-4 inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-900 transition">
                    Editar perfil
                </a>
            </div>

            <!-- Listado de reservas -->
            <div class="w-full md:w-2/3 flex flex-col gap-6">
                @if (Auth::user()->reservations->isEmpty())
                            <p class="text-gray-600">Aún no has realizado ningúna reserva.</p>
                @else
                    @forelse(Auth::user()->reservations->sortByDesc('date') as $reservation)
                        <div class="bg-white p-6 rounded-lg shadow-lg transition hover:shadow-xl relative">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-bold text-blue-800">Reserva #{{ $reservation->id }}</h3>
                                    <p class="text-sm text-gray-600">Fecha: {{ $reservation->date }} - Hora: {{ $reservation->hour }}</p>
                                    <p class="text-sm text-gray-600">Personas: {{ $reservation->number_people }}</p>
                                </div>
                                <button data-id="{{ $reservation->id }}"
                                        class="toggle-reservation-btn bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">
                                    Ver Detalles
                                </button>
                            </div>

                            <div id="res-details-{{ $reservation->id }}" class="hidden opacity-0 scale-y-75 transition-all duration-300 ease-in-out mt-4">
                                <div class="text-sm text-gray-700 space-y-1 border-t pt-3">
                                    <p><strong>Nombre:</strong> {{ $reservation->name }} {{ $reservation->surname }}</p>
                                    <p><strong>Teléfono:</strong> {{ $reservation->phone }}</p>
                                    <p><strong>Email:</strong> {{ $reservation->email }}</p>
                                    @if($reservation->message)
                                        <p><strong>Mensaje:</strong> {{ $reservation->message }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">Aún no has realizado ninguna reserva.</p>
                    @endforelse
                @endif
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script type="module" src="{{ Vite::asset('resources/js/myreservations.js') }}"></script>
@endpush
