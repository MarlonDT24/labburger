@extends('layout')

@section('title', 'Realizar Pedido')

@section('content')
<section class="max-w-7xl mx-auto py-10 px-6 grid grid-cols-1 lg:grid-cols-[200px_3fr_1.4fr] gap-8">
    <aside class="hidden lg:flex flex-col gap-8 sticky top-20 self-start">
        <!-- Índice de categorías -->
        <nav id="category-index" class="space-y-4">
            @foreach ($categories as $category)
            <a href="#cat-{{ $category->id }}" data-id="{{ $category->id }}"
                class="block text-blue-700 p-2 font-semibold hover:underline font-techno transition">
                {{ $category->name }}
            </a>
            @endforeach
        </nav>
        <!-- Buscador -->
        <input id="product-search" type="text" placeholder="Buscar producto..."
            class="px-4 py-2 border rounded-lg w-full">
    </aside>

    <!-- Sección de productos -->
    <div>
        <h2 class="text-3xl font-bold text-blue-800 font-techno mb-6 glow-blue">MENU LAB</h2>
        <div id="products-grid">
            @foreach ($categories as $category)
                <div id="cat-{{ $category->id }}" class="mb-8 scroll-mt-30 pt-5">
                    <h3 class="text-2xl font-bold text-blue-800 mb-4 font-techno">{{ $category->name }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($products->where('category_id', $category->id) as $product)
                            <div class="bg-white border border-blue-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-blue-800 font-techno glow-blue">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-600 mb-2">{{ $product->description }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-blue-700">{{ number_format($product->price, 2) }} €</span>
                                        <button data-id="{{ $product->id }}"
                                            class="add-to-cart-btn bg-blue-600 text-white text-sm px-4 py-1 rounded-full font-bold hover:bg-blue-700 transition duration-200">
                                            Añadir al Carrito +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Carrito -->
    <div class="bg-gray-100 rounded-lg shadow-md px-1 sticky top-20 h-fit">
        <h3 class="text-xl font-bold text-blue-800 mb-4 font-techno">Tu Pedido</h3>
        <ul id="cart-items" class="space-y-3">
            <!-- Productos añadidos aquí dinámicamente -->
        </ul>

        <div class="mt-4 border-t pt-4">
            <p class="text-gray-700">Total: <span id="cart-total" class="font-bold text-lg">0.00 €</span></p>
            <a href="{{ route('orders.checkout') }}" class="block mt-4 text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                Realizar Pago
            </a>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/order.js') }}"></script>
@endpush
