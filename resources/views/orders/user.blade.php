@extends('layout')

@section('title', 'Pedidos Realizados')

@section('content')
    <!-- Hero -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">PEDIDOS REALIZADOS</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Pedidos Realizados</p>
            <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">¡Aqui tienes tus pedidos realizados!</p>
        </div>
    </section>

    <!-- Detalles -->
    <section class="py-16 bg-gray-300 ">
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
                                class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-blue-200 text-blue-800 shadow transition text-center">
                                Mi perfil
                            </a>
                        </li>
                        <li>
                            <button
                                class="w-full py-3 rounded-lg bg-blue-700 text-white shadow transition hover:bg-blue-800 text-center font-semibold">
                                Mis pedidos
                            </button>
                        </li>
                        <li>
                            <a href="{{ route('reservations.user') }}"
                                class="block w-full py-3 rounded-lg bg-gray-100 hover:bg-blue-200 text-blue-800 shadow transition text-center">
                                Mis reservas
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Zona central -->
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

                <!-- Pedidos -->
                <div class="w-full md:w-2/3 flex flex-col gap-6">
                    @if ($orders->isEmpty())
                        <p class="text-white">Aún no has realizado ningún pedido.</p>
                    @else
                        @foreach ($orders as $order)
                            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col gap-4">

                                <div class="flex flex-col md:flex-row justify-between items-center">
                                    <div>
                                        <p class="font-bold text-lg">Pedido #{{ $order->id }}</p>
                                        <p class="text-gray-600 text-sm mt-1">Fecha: {{ $order->date }} | Estado:
                                            {{ ucfirst($order->state) }}</p>
                                        <p class="text-blue-800 font-semibold mt-1">Total:
                                            {{ number_format($order->totalPrice(), 2) }} €</p>
                                    </div>
                                    <button data-id="{{ $order->id }}"
                                        class="toggle-details-btn mt-4 md:mt-0 bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-900 transition font-semibold">Ver
                                        Detalles</button>
                                </div>

                                <!-- Detalles ocultos dentro de la misma card -->
                                <div id="details-{{ $order->id }}"
                                    class="hidden transition-all duration-300 ease-in-out">
                                    <table class="w-full text-sm text-left mt-4 border-t">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="py-2 px-2">Imagen</th>
                                                <th class="py-2 px-2">Producto</th>
                                                <th class="py-2 px-2">Cantidad</th>
                                                <th class="py-2 px-2">Precio Unitario</th>
                                                <th class="py-2 px-2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $product)
                                                <tr class="border-t">
                                                    <td class="py-2 px-2">
                                                        <img src="{{ asset($product->image ?? '/img/default.png') }}"
                                                            alt="{{ $product->name }}"
                                                            class="w-14 h-14 rounded object-cover">
                                                    </td>
                                                    <td class="py-2 px-2">{{ $product->name }}</td>
                                                    <td class="py-2 px-2">{{ $product->pivot->quantity }}</td>
                                                    <td class="py-2 px-2">
                                                        {{ number_format($product->pivot->total_price / $product->pivot->quantity, 2) }}
                                                        €</td>
                                                    <td class="py-2 px-2">
                                                        {{ number_format($product->pivot->total_price, 2) }} €</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/myorders.js') }}"></script>
@endpush
