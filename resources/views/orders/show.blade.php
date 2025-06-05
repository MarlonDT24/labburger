@extends('layout')

@section('title', 'Detalles del Pedido')

@section('content')
    <!-- Hero -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">PEDIDO REALIZADO</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Realizar Pedido > Pedido nº: {{ $order->id }}</p>
            <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">¡Perfecta elección, disfrútalo!</p>
        </div>
    </section>

    <!-- Detalles -->
    <section class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-1">
            <h2 class="text-3xl text-blue-800 font-bold text-center mb-10 font-techno glow-blue animate-fade-in">Detalles del Pedido</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 animate-fade-in-up">
                <!-- Info cliente -->
                <div class="bg-white rounded-lg shadow-lg p-6 space-y-3">
                    <h3 class="text-xl font-semibold mb-4 text-blue-800 font-techno">Datos del cliente</h3>
                    <p>
                        <span class="font-bold">Nombre: </span>
                        <span>{{ $order->name }}</span>
                        <span>{{ $order->surname }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Dirección: </span>
                        <span>{{ $order->address }} {{ $order->portal ? ' - Portal: ' . $order->portal : '' }} {{ $order->door ? ' - Puerta: ' . $order->door : '' }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Teléfono: </span>
                        <span>{{ $order->phone }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Email: </span>
                        <span>{{ $order->email }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Método de pago: </span>
                        <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Estado: </span>
                        <span>{{ ucfirst($order->state) }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Fecha: </span>
                        <span>{{ $order->date }}</span>
                    </p>
                </div>

                <!-- Productos -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-blue-800 font-techno">Productos solicitados</h3>
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-blue-50 text-blue-900">
                                <th class="py-2">Imagen</th>
                                <th>Producto</th>
                                <th>Cant.</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="py-2"><img src="{{ $product->image }}" class="w-12 h-12 rounded" alt="{{ $product->name }}"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ number_format($product->pivot->total_price / $product->pivot->quantity, 2) }}€</td>
                                    <td>{{ number_format($product->pivot->total_price, 2) }}€</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-bold text">
                                <td colspan="4" class="pt-4 text-right">Total: </td>
                                <td class="pt-4">{{ number_format($order->products->sum('pivot.total_price'), 2) }} €</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex flex-wrap justify-center mt-12 gap-4 animate-fade-in-up delay-300 font-techno">
                <a href="{{ route('home') }}"
                   class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow transition">
                    Volver al Inicio
                </a>
                <a href="{{ route('orders.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow transition">
                    Realizar Otro Pedido
                </a>
                @auth
                    <a href="{{ route('orders.user', Auth::user()->orders->last()->id) }}"
                       class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded shadow transition">
                        Mis Pedidos
                    </a>
                @endauth
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        // Vaciar el carrito del navegador tras completar el pedido
        localStorage.removeItem('cart');
    </script>
@endpush
