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
                        class="cursor-pointer border-t-4 border-b-4 border-transparent hover:border-blue-800 transition px-4 py-2 text-gray-700 font-semibold category-btn font-techno"
                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                        <img src="{{ url($category->icon) }}" alt="{{ $category->name }}" class="w-20 h-20 mx-auto mb-1">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Productos de la categoría -->
    <section class="bg-white py-3 mb-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-center gap-6 mb-10">
                <!-- Con gradient agregas una linea -->
                <div class="w-100 h-1 bg-gradient-to-r from-blue-300 via-blue-600 to-blue-300 rounded-full shadow-md"></div>
                <h3 id="categoria-titulo" class="text-3xl font-bold text-center text-blue-800 font-techno glow-blue invisible">
                    <!-- el js rellenara el nombre -->
                </h3>
                <div class="w-100 h-1 bg-gradient-to-r from-blue-300 via-blue-600 to-blue-300 rounded-full shadow-md"></div>
            </div>
            {{-- Solo el administrador puede añadir, eliminar o modificar un producto --}}
            @if (Auth::check() && Auth::user()->type === 'administrador')
                <div class="text-center my-8">
                    <button id="toggle-form-btn"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Añadir nuevo producto
                    </button>
                </div>

                <div id="product-form" class="max-w-3xl mx-auto p-13 bg-gray-100 rounded-lg shadow hidden">
                    <form action="{{ route('products.store') }}" method= "POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Categoría</label>
                                <select name="category_id" class="w-full border rounded px-3 py-2" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Nombre</label>
                                <input type="text" name="name" class="w-full border rounded px-3 py-2">
                            </div>
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Imagen (.jpg o .png)</label>
                                <input type="file" accept="image/png,image/jpeg" name="image"
                                    class="w-full bg-blue-600 text-white hover:bg-blue-700 border rounded px-3 py-2">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-1 font-semibold text-sm">Descripción</label>
                                <textarea name="description" class="w-full border rounded px-3 py-2" rows="3"></textarea>
                            </div>
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Precio</label>
                                <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2">
                            </div>
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Valoración (1-5)</label>
                                <input type="number" min="1" max="5" name="rating"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-1 font-semibold text-sm">Alergenos</label>
                                <input type="text" name="allergens" class="w-full border rounded px-3 py-2">
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit"
                                class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded">
                                Guardar producto
                            </button>
                        </div>
                    </form>
                </div>
            @endif
            <!-- Aquí se mostrará los productos segun la categoría que se elija con un contenedor dínamico-->
            <div id="productos-container" class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- El menu.js carga los productos aquí -->
            </div>
        </div>
    </section>


@endsection
