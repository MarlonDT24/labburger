<section class="bg-[#0A199F] text-white py-16 px-14">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Hamburguesa -->
        <div class="relative bg-gray-400 p-6 rounded">
            <h3 class="text-xl font-bold font-techno text-center mb-4">HAMBURGUESA</h3>
            <div class="relative">
                <button id="prevBurger" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded-l">◀</button>
                <img id="burgerImage" src="/img/products/burgers/doctor.png" alt="Hamburguesa popular" class="mx-auto h-64 rounded shadow fade-scale-in transition-all duration-500"/>
                <button id="nextBurger" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded-r">▶</button>
            </div>
            <div class="mt-4 space-y-2 text-center">
                <div id="burgerPrice" class="font-semibold">8,50 €</div>
                <div id="burgerInfo" class="text-sm text-white">Pan brioche, doble carne, cheddar y salsa secreta</div>
                <a href="/pedido" class="inline-block mt-4 bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-600 transition font-techno">Hacer Pedido</a>
            </div>
        </div>

        <!-- Información y reseñas -->
        <div class="space-y-27">
            <h2 class="text-3xl font-bold mb-3 font-techno">LAS POPULARES DE LA CASA</h2>
            <p class="mb-6">Nuestras hamburguesas crean una gran diferencia entre el público por su gran calidad y sabor.</p>
            <p class="italic mb-6">Y no lo decimos nosotros...</p>
            {{-- Reseñas de cada burger --}}
            <div class="relative">
                <div id="reviewContainer" class="overflow-hidden h-32 relative">
                    <div class="transition-all duration-500" id="reviewSlider">

                    </div>
                </div>
                <button id="nextReview" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white text-2xl">⬇</button>
            </div>
            <div id="burgerTags" class="mt-6 flex justify-center space-x-4">
                <img src="/images/frescura.png" alt="Frescura" class="h-10">
                <img src="/images/delicioso.png" alt="Delicioso" class="h-10">
                <img src="/images/precio.png" alt="Buen precio" class="h-10">
            </div>
        </div>
    </div>
</section>
