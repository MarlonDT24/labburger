@

@extends('layout')

@section('title', 'Carta')

@section('content')
    <!-- Hero Section -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text">CARTA</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno">Inicio > Carta</p>
            <!-- Mejora visual: Añadir íconos de decoración o una frase destacada -->
            <p class="text-lg text-blue-200 italic mt-4">Descubre nuestras creaciones más sabrosas, ¡Elige tu favorita!</p>
        </div>
    </section>

    <!-- Categorías -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-6 font-techno glow-blue">Nuestros mejores productos</h2>
            <p class="text-sm text-gray-500 mt-2 mb-4 font-techno">Todos los productos tienen una calificación 100% objetiva
                por parte de nuestros clientes</p>
            <div id="container-categories" class="flex justify-center flex-wrap gap-4">
                @foreach ($categories as $category)
                    <button
                        id={{ $category->id}}
                        class="border-t-4 border-b-4 border-transparent hover:border-blue-800 transition px-4 py-2 text-gray-700 font-semibold category-btn"
                        data-category={{ $category->name }}>
                        <img src="{{ url($category->icon) }}" alt="{{ $category->name }}"
                            class="w-20 h-20 mx-auto mb-1">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Productos de la categoría -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h3 id="categoria-titulo" class="text-2xl font-bold text-center mb-8">Combos</h3>

            <div id="productos-container" class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Aquí se llenarán los productos por categoría -->
                @foreach ($productos ?? [] as $producto)
                    <div class="bg-yellow-100 p-4 rounded-lg shadow relative">
                        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}"
                            class="w-20 h-20 rounded-full mx-auto">
                        <h4 class="mt-4 text-lg font-bold text-center">{{ $producto->nombre }}</h4>
                        <p class="text-sm text-gray-600 text-center">{{ $producto->descripcion }}</p>
                        <div class="text-center mt-2">
                            <span class="text-red-600 font-bold">{{ $producto->precio }}€</span>
                        </div>
                        <div class="text-center mt-1 text-sm text-gray-500 line-through">{{ $producto->precio_original }}€
                        </div>
                        <div class="flex justify-center mt-2">
                            <button
                                class="bg-rose-600 text-white py-1 px-3 rounded-full text-sm hover:bg-rose-700 transition">PEDIR
                                AHORA</button>
                        </div>
                        <!-- Alergenos toggle -->
                        <button
                            class="absolute top-2 right-2 bg-white border rounded-full w-8 h-8 flex items-center justify-center text-gray-600 hover:text-blue-600 transition allergen-btn">i</button>
                        <div
                            class="hidden absolute top-12 right-2 bg-white border rounded p-2 text-sm shadow-lg allergen-info">
                            {{ $producto->alergenos ?? 'Contiene gluten, lactosa, frutos secos...' }}
                        </div>
                        <!-- Estrellas -->
                        <div class="text-center mt-3 text-yellow-500">
                            ★★★★☆ <span class="text-sm text-gray-600">({{ $producto->valoraciones }} valoraciones)</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Slider de productos -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="overflow-x-auto whitespace-nowrap slider-wrapper">
                <div class="inline-flex gap-4 transition-all duration-700 ease-in-out slider-track">
                    @foreach ($productos_slider ?? [] as $producto)
                        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}"
                            class="h-48 w-72 object-cover rounded shadow">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
