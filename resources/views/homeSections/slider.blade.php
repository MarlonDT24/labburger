<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div id="slider" class="relative w-full h-[550px]">
        <!-- Ingredientes flotantes detrás -->
        <div class="pointer-events-none absolute inset-0 z-0" id="floating-ingredients">
            <img src="/img/iconslider/carneburger.png" class="ingredient absolute w-30 top-[15%] left-[6%]">
            <img src="/img/iconslider/bacon.png" class="ingredient absolute w-30 top-[55%] left-[40%]">
            <img src="/img/iconslider/cheese.png" class="ingredient absolute w-30 top-[73%] left-[12%]">
            <img src="/img/iconslider/pepinillos.png" class="ingredient absolute w-30 top-[16%] left-[87%]">
            <img src="/img/iconslider/patatas.png" class="ingredient absolute w-30 top-[66%] left-[87%]">
        </div>

        <!-- Slide Items -->
        <!-- absolute inset-0: posiciona el slide encima del contenedor ocupando todo su espacio -->
        <!-- data-index="0": Índice que se usa para identificar el slide desde JS-->

        <!-- Slider: Pagina 1 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide active" data-index="0">
            <div class="grid grid-cols-2 items-center h-full px-40">
                <div class="space-y-6 relative z-20">
                    <h2 class="text-4xl text-white font-techno leading-snug">Date el capricho que te mereces y pídete una Labb</h2>
                    <div class="space-x-4">
                        <a href="/pedido" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Realizar Pedido</a>
                        <a href="/reserva" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">Reservar Mesa</a>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-9 relative z-20">
                    <h3 class="text-xl text-white font-techno">Burger Lab</h3>
                    <img src="/img/burgers/lab.png" alt="Hamburguesa Lab" class="h-67">
                    <p class="text-white italic text-sm">"La preferida de la casa"</p>
                </div>
            </div>
        </div>

         <!-- Slider: Pagina 2 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="1">
            <div class="grid grid-cols-3 items-center h-full px-40">
                <div>
                    <h2 class="text-3xl font-bold mb-2">¡Oferta especial del mes!</h2>
                    <p class="text-lg">Pan brioche, doble carne smash, cheddar, cebolla caramelizada y salsa secreta</p>
                    <p class="text-xl font-semibold text-red-500 mt-2">Solo 8,95 €</p>
                </div>
                <div class="flex justify-center">
                    <img src="/images/hamburguesa2.png" alt="Promo Burger" class="h-80">
                </div>
                <div class="text-right">
                    <a href="/pedido" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Pedir Oferta</a>
                </div>
            </div>
        </div>

         <!-- Slider: Pagina 3 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="2">
            <div class="grid grid-cols-2 items-center h-full px-40">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Crea la hamburguesa del mes a tu gusto</h2>
                    <a href="/crear-hamburguesa" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Crear hamburguesa del mes</a>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-semibold mb-2">"La Titan Burg"</h3>
                    <img src="/images/burger-mes.png" alt="Hamburguesa del mes" class="mx-auto h-64">
                    <p class="mt-2 text-sm text-gray-600">Hecha por: Javier Gómez</p>
                </div>
            </div>
        </div>

         <!-- Slider: Pagina 4 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="3">
            <div class="h-full flex items-center justify-center px-12">
                <div class="w-full max-w-4xl overflow-x-auto whitespace-nowrap space-x-6 flex">
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“Buenísima calidad y servicio rápido.”<br><span class="text-sm text-gray-500">– Laura</span></div>
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“La hamburguesa del mes estaba brutal.”<br><span class="text-sm text-gray-500">– Pedro</span></div>
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“Repetiré sin dudarlo.”<br><span class="text-sm text-gray-500">– Marta</span></div>
                </div>
            </div>
        </div>

        <!-- Enumeración lateral -->
        <div class="absolute top-1/2 left-6 transform -translate-y-1/2 space-y-6 text-white text-xl">
            <div class="dot cursor-pointer" data-go="0">1</div>
            <div class="dot cursor-pointer" data-go="1">2</div>
            <div class="dot cursor-pointer" data-go="2">3</div>
            <div class="dot cursor-pointer" data-go="3">4</div>
        </div>
    </div>
</section>