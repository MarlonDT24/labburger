@extends('layout')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-2 grid grid-cols-1 lg:grid-cols-[2fr_2fr] gap-12">
        <!-- Formulario de datos -->
        <div>
            <h2 class="text-3xl font-bold text-blue-800 mb-6 font-techno">Datos de envío</h2>

            <form action="{{ route('orders.process') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" name="name" placeholder="Nombre" class="input-style font-techno" value="{{ old('name', $user->name ?? '') }}">
                    <input type="text" name="surname" placeholder="Apellidos" class="input-style font-techno" value="{{ old('surname', $user->surname ?? '') }}">
                </div>

                <input type="text" name="address" placeholder="Domicilio" class="input-style font-techno" value="{{ old('address') }}">

                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" name="portal" placeholder="Portal" class="input-style font-techno" value="{{ old('portal') }}">
                    <input type="text" name="door" placeholder="Puerta" class="input-style font-techno" value="{{ old('door') }}">
                </div>
                <input type="text" name="notes" placeholder="Observaciones" class="input-style font-techno" value="{{ old('notes') }}">

                <input type="email" name="email" placeholder="Correo electrónico" class="input-style font-techno" value="{{ old('email', Auth::user()->email ?? '') }}">
                <input type="tel" name="phone" placeholder="Teléfono" class="input-style font-techno" value="{{ old('phone', Auth::user()->phone ?? '') }}">

                @guest
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-blue-800 p-4 rounded">
                        <p class="font-semibold">¿Ya tienes cuenta?</p>
                        <p class="text-sm mb-2">Ahorra tiempo y pídelo al instante iniciando sesión.</p>
                        <a href="{{ route('login') }}"
                            class="inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Iniciar Sesión
                        </a>
                    </div>
                @endguest

                <!-- Métodos de pago -->
                <h3 class="text-xl font-bold text-blue-800 mt-8 font-techno">Método de pago</h3>
                <div class="space-y-3" id="payment-options">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_method" value="credit_card" id="pay-credit" checked>
                        Tarjeta de crédito/débito
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_method" value="paypal" id="pay-paypal">
                        PayPal
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_method" value="bank" id="pay-bank">
                        Transferencia bancaria
                    </label>
                </div>

                <!-- Campos dinámicos -->
                <div id="payment-fields" class="mt-4 space-y-4">
                    <!-- Aquí se insertan los campos adicionales de pago -->
                </div>

                <button type="submit"
                    class="w-full mt-6 bg-green-600 text-white py-3 rounded font-semibold hover:bg-green-700 transition">
                    Realizar Pedido
                </button>
            </form>
        </div>

        <!-- Resumen del carrito -->
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold text-blue-800 mb-4 font-techno">Tu Pedido</h3>

            <table class="w-full text-sm mb-4 text-center">
                <thead>
                    <tr class="text-center border-b">
                        <th class="pb-2">Imagen</th>
                        <th class="pb-2">Producto</th>
                        <th class="pb-2 text-center">Precio</th>
                        <th class="pb-2 text-center">Cant.</th>
                        <th class="pb-2 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $item)
                        @php
                            $image = $item['image'] ?? '/img/default.png';
                            $name = $item['name'] ?? 'Producto';
                            $price = $item['price'] ?? 0;
                            $quantity = $item['quantity'] ?? 0;
                            $itemTotal = $price * $quantity;
                            $total += $itemTotal;
                        @endphp
                        <tr class="border-b">
                            <td class="py-2"><img src="{{ $image }}" class="w-12 h-12 rounded" alt=""></td>
                            <td class="py-2">{{ $name }}</td>
                            <td class="py-2 text-center">{{ number_format($price, 2) }} €</td>
                            <td class="py-2 text-center">{{ $quantity }}</td>
                            <td class="py-2 text-right">{{ number_format($itemTotal, 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-bold">
                        <td colspan="4" class="pt-4 text-right">Total:</td>
                        <td class="pt-4 text-right">{{ number_format($total, 2) }} €</td>
                    </tr>
                </tfoot>
            </table>

            <!-- Botón de Seguir Comprando -->
            <a href="{{ route('orders.create') }}"
                class="block text-center mb-4 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                ← Seguir Comprando
            </a>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/checkout.js') }}"></script>
@endpush
