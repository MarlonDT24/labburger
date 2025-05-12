<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div id="slider" class="relative w-full h-[600px]">
        <!-- Slide Items -->
        <!-- absolute inset-0: posiciona el slide encima del contenedor ocupando todo su espacio -->
        <!-- data-index="0": Índice que se usa para identificar el slide desde JS-->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide active" data-index="0">
            <div class="grid grid-cols-2 items-center h-full px-80">
                <div class="space-y-6">
                    <h2 class="text-4xl text-white font-techno">Date un capricho que te lo mereces y pídete una Labb</h2>
                    <div class="space-x-4">
                        <a href="/pedido" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Realizar Pedido</a>
                        <a href="/reserva" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">Reservar Mesa</a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <img src="/img/burger_labb.jpeg" alt="Hamburguesa" class="h-100">
                </div>
            </div>
        </div>

        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="1">
            <div class="grid grid-cols-3 items-center h-full px-80">
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

        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="2">
            <div class="grid grid-cols-2 items-center h-full px-80">
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
