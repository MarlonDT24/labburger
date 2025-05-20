@extends('layout')

@section('title', 'Carta')

@section('content')
    <!-- Hero Section -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text">CARTA</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno">Inicio > Carta</p>
            <p class="text-lg text-blue-200 italic mt-4">Descubre nuestras creaciones más sabrosas, ¡Elige tu favorita!</p>
        </div>
    </section>

    <!-- Categorías -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-6 font-techno glow-blue">Nuestros mejores productos</h2>
            <p class="text-sm text-gray-500 mt-2 mb-4 font-techno">Todos los productos tienen una calificación 100% objetiva
                por parte de nuestros clientes</p>
            <div id="container-categories" class="flex justify-center flex-wrap gap-8">
                @foreach ($categories as $category)
                <!-- Gracias a los data se pueden cazar las variables en el js -->
                    <button
                        class="border-t-4 border-b-4 border-transparent hover:border-blue-800 transition px-4 py-2 text-gray-700 font-semibold category-btn font-techno"
                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                        <img src="{{ url($category->icon) }}" alt="{{ $category->name }}"
                            class="w-20 h-20 mx-auto mb-1">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Productos de la categoría -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-center gap-6 mb-10">
                    <!-- Con gradient agregas una linea -->
                <div class="w-100 h-1 bg-gradient-to-r from-blue-300 via-blue-600 to-blue-300 rounded-full shadow-md"></div>
                <h3 id="categoria-titulo" class="text-3xl font-bold text-center text-blue-800 font-techno glow-blue">{{$category->name}}</h3>
                <div class="w-100 h-1 bg-gradient-to-r from-blue-300 via-blue-600 to-blue-300 rounded-full shadow-md"></div>
            </div>
            <!-- Aquí se mostrará los productos segun la categoría que se elija con un contenedor dínamico-->
            <div id="productos-container" class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- El menu.js carga los productos aquí -->
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
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/menu.js') }}"></script>
@endpush

