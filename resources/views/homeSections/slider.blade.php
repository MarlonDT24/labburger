<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div id="slider" class="relative w-full h-[550px]">
        <!-- Ingredientes flotantes detrás -->
        <div class="pointer-events-none absolute inset-0 z-0" id="floating-ingredients">
            <img src="/img/iconslider/carneburger.png" class="ingredient absolute w-30 top-[15%] left-[10%]">
            <img src="/img/iconslider/bacon.png" class="ingredient absolute w-30 top-[55%] left-[40%]">
            <img src="/img/iconslider/cheese.png" class="ingredient absolute w-30 top-[73%] left-[13%]">
            <img src="/img/iconslider/pepinillos.png" class="ingredient absolute w-30 top-[16%] left-[87%]">
            <img src="/img/iconslider/patatas.png" class="ingredient absolute w-30 top-[66%] left-[87%]">
        </div>

        <!-- Slide Items -->
        <!-- absolute inset-0: posiciona el slide encima del contenedor ocupando todo su espacio -->
        <!-- data-index="0": Índice que se usa para identificar el slide desde JS-->

        <!-- Slider: Pagina 1 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide active" data-index="0">
            <div class="grid grid-cols-2 items-center h-full px-90">
                <div class="space-y-8 relative z-20">
                    <h2 class="text-4xl text-white font-techno leading-snug glow-text">Date el capricho que te mereces y
                        pídete
                        una Labb</h2>
                    <div class="space-x-4">
                        <a href="/pedido"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-red-700 transition font-techno">Realizar
                            Pedido</a>
                        <a href="/reserva"
                            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition font-techno">Reservar
                            Mesa</a>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-9 relative z-20">
                    <h3 class="text-xl text-white font-techno glow-text underline-glow">Burger Lab</h3>
                    <img src="/img/products/burgers/lab.png" alt="Hamburguesa Lab" class="h-70">
                    <p class="text-white italic text-md">"La preferida de la casa"</p>
                </div>
            </div>
        </div>

        <!-- Slider: Pagina 2 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="1">
            <div class="grid grid-cols-2 items-center h-full px-90 gap-12">
                <!-- Columna 1: Título + descripción -->
                <div class="space-y-4">
                    <h2 class="text-3xl text-white font-bold font-techno glow-text">¡Oferta especial!</h2>
                    <p class="text-lg text-white">Incluye un Combo burguer Labb + burger Exp. Chicken + 2 bebidas + 2
                        patatas!</p>
                    <p class="text-xl text-white font-techno glow-text">Tan solo por 30,95 €</p>
                </div>
                <!-- Columna 2: Imagen + botón al lado -->
                <div class="flex items-center gap-14 justify-center relative z-20">
                    <!-- Contenedor de imagen con título encima -->
                    <div class="relative">
                        <!-- Título encima -->
                        <h3 class="text-xl text-white text-center font-techno glow-text underline-glow">Mega Combo Lab</h3>
                        <img src="/img/products/combos/megacombo.png" alt="Promo Megacombo" class="h-72">
                    </div>
                    <!-- Botón al lado -->
                    <a href="/pedido" class="btn-oferta transition-all duration-300 ease-in-out font-techno">Pedir Oferta</a>
                </div>
            </div>
        </div>

        <!-- Slider: Pagina 3 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="2">
            <div class="grid grid-cols-2 items-center h-full px-90">
                <div>
                    <h2 class="text-3xl text-white font-techno glow-text mb-4">Crea la hamburguesa del mes a tu gusto
                    </h2>
                    <a href="/crear-hamburguesa"
                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Crear
                        hamburguesa del mes</a>
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
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“Buenísima calidad y servicio
                        rápido.”<br><span class="text-sm text-gray-500">– Laura</span></div>
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“La hamburguesa del mes estaba
                        brutal.”<br><span class="text-sm text-gray-500">– Pedro</span></div>
                    <div class="inline-block bg-white rounded shadow p-4 min-w-[250px]">“Repetiré sin dudarlo.”<br><span
                            class="text-sm text-gray-500">– Marta</span></div>
                </div>
            </div>
        </div>

        <!-- Enumeración lateral hamburguesa vertical -->
        <div id="burger-steps"
            class="absolute top-1/2 left-26 transform -translate-y-1/2 flex flex-col items-center gap-6 z-20">
            <button data-go="0" class="burger-btn">
                <img src="/img/iconslider/tapa.png" class="step-part w-12 opacity-20 transition-all" />
            </button>
            <button data-go="1" class="burger-btn">
                <img src="/img/iconslider/cheese.png" class="step-part w-12 opacity-20 transition-all" />
            </button>
            <button data-go="2" class="burger-btn">
                <img src="/img/iconslider/carneburger.png" class="step-part w-12 opacity-20 transition-all" />
            </button>
            <button data-go="3" class="burger-btn">
                <img src="/img/iconslider/base.png" class="step-part w-12 opacity-20 transition-all" />
            </button>
        </div>
    </div>
</section>
