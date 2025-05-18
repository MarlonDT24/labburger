<section class="bg-gray-200 p-16">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-28 items-center px-6">

        <!-- COLUMNA IZQUIERDA -->
        <div class="space-y-6 text-center md:text-center">
            <h2 class="text-2xl font-bold text-blue-700 font-techno glow-text">Valora nuestra hamburguesería</h2>
            <p class="text-black text-lg">Regístrate en nuestra página para dejar una reseña</p>
            <p class="text-gray-600">Las leeremos con mucho gusto</p>
            <div class="flex justify-center md:justify-center gap-8 mt-4">
                <a href="{{ route('loginForm') }}"
                   class="bg-blue-700 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 transition font-techno">Iniciar sesión</a>
                <a href="{{ route('signupForm') }}"
                   class="bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded hover:bg-gray-400 transition font-techno">Registrarse</a>
            </div>
        </div>

        <!-- COLUMNA DERECHA -->
        <div class="bg-white p-6 rounded shadow-lg">
            @auth
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ Auth::user()->avatar ?? '/images/default-avatar.png' }}" alt="Avatar"
                         class="h-12 w-12 rounded-full object-cover">
                    <div>
                        <p class="text-gray-800 font-semibold">{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                        <p class="text-sm text-gray-500">Estás logueado</p>
                    </div>
                </div>

                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Puntuación</label>
                        <select name="rating"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                            <option value="">Selecciona una opción</option>
                            <option value="5">★★★★★ - Excelente</option>
                            <option value="4">★★★★☆ - Muy buena</option>
                            <option value="3">★★★☆☆ - Buena</option>
                            <option value="2">★★☆☆☆ - Regular</option>
                            <option value="1">★☆☆☆☆ - Mala</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Reseña</label>
                        <textarea name="comments" rows="4" placeholder="Cuéntanos tu experiencia..."
                                  class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-md transition">
                            Enviar Reseña
                        </button>
                    </div>
                </form>
            @else
                <div class="text-center text-gray-500 text-sm">
                    <p class="text-xl mb-4 font-techno">Debes iniciar sesión para enviar una reseña.</p>
                    <p class="text-xl"> Formulario no disponible</p>
                </div>
            @endauth
        </div>
    </div>
</section>
