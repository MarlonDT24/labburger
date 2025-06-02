@extends('layout')

@section('title', 'Nosotros')

@section('content')
    <!-- Hero -->
    <section class="relative p-22 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">SOBRE NOSOTROS</h1>
            <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Nosotros</p>
            <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">Más que hamburguesas, somos pasión.</p>
        </div>
    </section>

    <!-- Quiénes Somos -->
    <section class="bg-white py-20">
         <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-42 items-center">
        <div class="animate-fade-in-up delay-200">
            <h2 class="text-4xl font-bold text-blue-800 font-techno glow-blue mb-6">¿Quiénes somos?</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Somos un equipo apasionado por las hamburguesas. Nuestra misión es romper las leyes de la física culinaria combinando sabor, calidad e innovación.
                Con ingredientes frescos y un toque tecnológico, creamos experiencias únicas para todos nuestros clientes.
            </p>

            <!-- Bloque de iconos de valores -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 mt-12 text-center">

                <!-- Alimentos Frescos -->
                <div class="relative group animate-fade-in-up delay-100 transform transition-transform duration-400 hover:-translate-y-2">
                    <div class="bg-gradient-to-b from-black to-blue-700 p-6 rounded-full mx-auto w-28 h-28 flex items-center justify-center shadow-lg">
                        <img src="/img/about/alimentosfrescos.png" alt="Alimentos Frescos" class="w-14 h-14">
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mt-4 font-techno">Alimentos Frescos</h3>

                    <!-- Tooltip -->
                    <div class="absolute bottom-full mb-3 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-blue-900 text-white text-sm rounded px-4 py-2 shadow-lg">
                            Productos siempre frescos de productores locales.
                        </div>
                    </div>
                </div>

                <!-- Servicio Rápido -->
                <div class="relative group animate-fade-in-up delay-100 transform transition-transform duration-400 hover:-translate-y-2">
                    <div class="bg-gradient-to-b from-black to-blue-700 p-6 rounded-full mx-auto w-28 h-28 flex items-center justify-center shadow-lg">
                        <img src="/img/about/serviciorap.png" alt="Servicio Rápido" class="w-20 h-18">
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mt-4 font-techno">Servicio Rápido</h3>

                    <div class="absolute bottom-full mb-3 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-blue-900 text-white text-sm rounded px-4 py-2 shadow-lg">
                            Recibe tu pedido caliente en tiempo récord.
                        </div>
                    </div>
                </div>

                <!-- Chefs Expertos -->
                <div class="relative group animate-fade-in-up delay-100 transform transition-transform duration-400 hover:-translate-y-2">
                    <div class="bg-gradient-to-b from-black to-blue-700 p-6 rounded-full mx-auto w-28 h-28 flex items-center justify-center shadow-lg">
                        <img src="/img/about/chefsprofe.png" alt="Chefs Expertos" class="w-14 h-14">
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mt-4 font-techno">Chefs Expertos</h3>

                    <div class="absolute bottom-full mb-3 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-blue-900 text-white text-sm rounded px-4 py-2 shadow-lg">
                            Cocineros formados en alta cocina internacional.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Imagen lateral -->
        <div class="relative animate-fade-in-up delay-100">
            <img src="/img/about/equipococina.jpg" alt="Equipo" class="rounded-xl shadow-lg hover:scale-105 transition-transform duration-500">
        </div>
    </div>
    </section>

    <!-- Nuestro Equipo -->
    <section class="py-20 bg-gray-200">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-blue-800 font-techno glow-blue mb-15 animate-fade-in-down">Nuestro Equipo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 animate-fade-in-up delay-500">
                <!-- Chef 1-->
                <div class="bg-white p-8 rounded-xl shadow-lg transform transition-transform duration-500 hover:-translate-y-3 hover:shadow-2xl group">
                    <img src="/img/about/chef1.jpg" alt="Chef 1" class="rounded-full w-50 h-50 mx-auto mb-6 shadow-md">
                    <h3 class="text-xl font-bold text-black mb-2">Alexander</h3>
                    <p class="text-gray-600">Cocinero Principal</p>
                    <!-- Redes sociales -->
                    <div class="mt-3 flex justify-center gap-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-blue-500">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-pink-500">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-sky-400">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </div>
                </div>
                <!-- Chef 2-->
                <div class="bg-white p-8 rounded-xl shadow-lg transform transition-transform duration-500 hover:-translate-y-3 hover:shadow-2xl group">
                    <img src="/img/about/chef2.jpg" alt="Chef 2" class="rounded-full w-50 h-50 mx-auto mb-6 shadow-md">
                    <h3 class="text-xl font-bold text-black mb-2">Pedro</h3>
                    <p class="text-gray-600">Jefe de Sala</p>
                        <div class="mt-3 flex justify-center gap-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-blue-500">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                            <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-pink-500">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                            <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-sky-400">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                        </div>
                </div>
                <!-- Chef 3-->
                <div class="bg-white p-8 rounded-xl shadow-lg transform transition-transform duration-500 hover:-translate-y-3 hover:shadow-2xl group">
                    <img src="/img/about/chef3.jpg" alt="Chef 3" class="rounded-full w-50 h-50 mx-auto mb-6 shadow-md">
                    <h3 class="text-xl font-bold text-black mb-2">Jaime</h3>
                    <p class="text-gray-600">Ayudante de Cocina</p>
                    <div class="mt-3 flex justify-center gap-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-blue-500">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-pink-500">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                        <a href="#" class="transform transition-transform duration-300 hover:scale-125 hover:text-sky-400">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Premios -->
    <section class="py-20 bg-gradient-to-r from-blue-600 via-blue-800 to-blue-600 text-white relative">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold font-techno glow-text mb-6 animate-fade-in-down">Nuestros Premios</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 animate-fade-in-up delay-500">
                    <div class="p-8 text-blue-900 transition-transform duration-500 group-hover:scale-105">
                        <img src="/img/about/premio1.png" alt="Premio 1" class="mx-auto w-45 h-43 mb-4">
                        <h3 class="text-xl text-white font-bold mb-2">5 Estrellas Michelín</h3>
                        <p class="text-sm text-gray-300">2024-25</p>
                    </div>
                    <div class="p-8 text-blue-900 transition-transform duration-500 group-hover:scale-105">
                        <img src="/img/about/premio2.png" alt="Premio 2" class="mx-auto w-45 h-43 mb-4">
                        <h3 class="text-xl text-white font-bold mb-2">Mejor Chef del Año</h3>
                        <p class="text-sm text-gray-300">2024-25</p>
                    </div>
                    <div class="p-8 text-blue-900 transition-transform duration-500 group-hover:scale-105">
                        <img src="/img/about/premio3.png" alt="Premio 3" class="mx-auto w-45 h-43 mb-4">
                        <h3 class="text-xl text-white font-bold mb-2">La Mejor Hamburguesa de Valencia</h3>
                        <p class="text-sm text-gray-300">2024</p>
                    </div>
                    <div class="p-8 text-blue-900 transition-transform duration-500 group-hover:scale-105">
                        <img src="/img/about/premio4.png" alt="Premio 4" class="mx-auto w-45 h-43 mb-4">
                        <h3 class="text-xl text-white font-bold mb-2">El Mejor Restaurante 2024</h3>
                        <p class="text-sm text-gray-300">2024</p>
                    </div>
            </div>
        </div>
    </section>

    <!-- Colaboradores -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-blue-800 font-techno glow-blue mb-10 animate-fade-in-down">Colaboradores</h2>

            <div id="collaborator-slider" class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/cocacola.png" class="h-32 mx-auto mb-4" alt="Coca Cola">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/estrella.png" class="h-32 mx-auto mb-4" alt="Estrella Galicia">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/lay.png" class="h-32 mx-auto mb-4" alt="Lay España">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/president.png" class="h-32 mx-auto mb-4" alt="President">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/glovo.png" class="h-32 mx-auto mb-4" alt="Glovo">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/ubereats.png" class="h-32 mx-auto mb-4" alt="Uber Eats">
                    </div>
                    <div class="swiper-slide collab-card bg-gray-100 p-6 rounded-xl shadow-lg transition-transform duration-500 hover:scale-110 hover:shadow-2xl">
                        <img src="/img/about/justeat.png" class="h-32 mx-auto mb-4" alt="Just Eat">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script type="module" src="{{ Vite::asset('resources/js/about.js') }}"></script>
@endpush
