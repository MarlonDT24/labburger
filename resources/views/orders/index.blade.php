@extends('layout')

@section('title', 'Administrar Pedidos')

@section('content')
<section class="bg-gray-300 min-h-screen">
    <div class="max-w-7xl mx-auto px-2 py-10"> {{-- max-w-6xl para un ancho intermedio --}}
        <h1 class="text-3xl font-bold text-blue-800 mb-8 font-techno">Administrar Pedidos</h1>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-200 border-b border-blue-300">
                    <tr>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">ID</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Cliente</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Fecha</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Productos</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Total</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Estado</th>
                        <th class="px-6 py-3 text-center font-medium text-blue-800 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 border-b border-gray-300">
                    @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">
                                @if($order->user)
                                    {{ $order->user->name }} {{ $order->user->surname }}
                                @else
                                    {{ $order->name }} {{ $order->surname }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-2">
                                    @php $firstProduct = $order->products->first(); @endphp

                                    <div class="flex justify-between items-center gap-3">
                                        {{-- Producto principal --}}
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $firstProduct->image }}" class="w-12 h-12 rounded object-cover">
                                            <div class="text-sm">
                                                <div class="font-semibold">{{ $firstProduct->name }}</div>
                                                <div class="text-xs text-gray-600">
                                                    {{ number_format($firstProduct->pivot->total_price, 2) }} €
                                                    (x{{ $firstProduct->pivot->quantity }})
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Botón solo si hay más de un producto --}}
                                        @if ($order->products->count() > 1)
                                            <button type="button"
                                                class="toggle-details-btn px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500"
                                                data-id="{{ $order->id }}">
                                                Ver detalles
                                            </button>
                                        @endif
                                    </div>

                                    {{-- Detalles ocultos --}}
                                    @if ($order->products->count() > 1)
                                        <div id="details-{{ $order->id }}"
                                            class="hidden transition-all duration-300 transform scale-y-0 origin-top">
                                            @foreach ($order->products->skip(1) as $product)
                                                <div class="flex items-center gap-3 my-2">
                                                    <img src="{{ $product->image }}" class="w-12 h-12 rounded object-cover">
                                                    <div class="text-sm">
                                                        <div class="font-semibold">{{ $product->name }}</div>
                                                        <div class="text-xs text-gray-600">
                                                            {{ number_format($product->pivot->total_price, 2) }} €
                                                            (x{{ $product->pivot->quantity }})
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ number_format($order->products->sum('pivot.total_price'), 2) }} €
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->state === 'completado' ? 'bg-green-200 text-green-600' : ($order->state === 'en proceso' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                    {{ ucfirst($order->state) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <form action="{{ route('orders.update', $order) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PUT')

                                    <select name="state" class="border rounded px-2 py-1">
                                        <option value="pendiente" {{ $order->state == 'pendiente' ? 'selected' : '' }}>
                                            Pendiente</option>
                                        <option value="en proceso" {{ $order->state == 'en proceso' ? 'selected' : '' }}>En
                                            proceso</option>
                                        <option value="completado" {{ $order->state == 'completado' ? 'selected' : '' }}>
                                            Completado</option>
                                    </select>
                                    <button type="submit"
                                        class="ml-2 px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-800">Guardar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay pedidos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/adminorders.js') }}"></script>
@endpush
