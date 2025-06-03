<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div id="slider" class="relative w-full min-h-[700px] md:h-[550px]">

        <!-- Ingredientes flotantes detrás -->
        <div class="pointer-events-none absolute inset-0 z-0 hidden sm:block" id="floating-ingredients">
            <img src="/img/iconslider/carneburger.png" class="ingredient absolute w-30 top-[15%] left-[10%]">
            <img src="/img/iconslider/bacon.png" class="ingredient absolute w-30 top-[55%] left-[40%]">
            <img src="/img/iconslider/cheese.png" class="ingredient absolute w-30 top-[73%] left-[13%]">
            <img src="/img/iconslider/pepinillos.png" class="ingredient absolute w-30 top-[16%] left-[87%]">
            <img src="/img/iconslider/patatas.png" class="ingredient absolute w-30 top-[66%] left-[87%]">
        </div>

        <!-- Slide 1 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide active" data-index="0">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full px-15 md:px-52 gap-10">
                <div class="space-y-6 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl text-white font-techno leading-snug glow-text">
                        Date el capricho que te mereces y pídete una Labb
                    </h2>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="{{ route('orders.create') }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-red-700 transition font-techno">Realizar
                            Pedido</a>
                        <a href="{{ route('reservations.create') }}"
                            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition font-techno">Reservar
                            Mesa</a>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-4">
                    <h3 class="text-lg md:text-xl text-white font-techno glow-text underline-glow">Burger Lab</h3>
                    <img src="/img/products/burgers/lab.png" alt="Hamburguesa Lab" class="h-48 md:h-72">
                    <p class="text-white italic text-sm md:text-md">"La preferida de la casa"</p>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="1">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full px-6 md:px-52 gap-10">
                <div class="space-y-4 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl text-white font-bold font-techno glow-text">¡Oferta especial!</h2>
                    <p class="text-base md:text-lg text-white">Incluye un Combo burguer Labb + burger Exp. Chicken + 2
                        bebidas + 2 patatas!</p>
                    <p class="text-lg md:text-xl text-white font-techno glow-text">Tan solo por 30,95 €</p>
                </div>
                <div class="flex flex-col items-center gap-4 md:flex-row md:justify-center md:items-center">
                    <div class="relative">
                        <h3 class="text-lg md:text-xl text-white text-center font-techno glow-text underline-glow mb-2">
                            Mega Combo Lab</h3>
                        <img src="/img/products/combos/megacombo.png" alt="Promo Megacombo" class="h-48 md:h-72">
                    </div>
                    <button
                        class="order-now-btn btn-oferta transition-all duration-300 ease-in-out font-techno"
                        data-id="999"
                        data-name="Mega Combo Lab"
                        data-price="30.95"
                        data-image="/img/products/combos/megacombo.png">
                        Pedir Oferta
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="2">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full px-6 md:px-52 gap-10">
                <div class="space-y-4 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl text-white font-techno glow-text mb-4">Crea la hamburguesa del mes a
                        tu gusto</h2>
                    @auth
                        <a href="{{ route('monthburgers.create') }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition font-techno">
                            Crear hamburguesa del mes
                        </a>
                    @else
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition font-techno">
                            Crear hamburguesa del mes
                        </span>
                        <div class="text-xs mt-5 text-white">Inicia sesión para crear la Hamburguesa del Mes</div>
                    @endauth
                </div>
                <div class="flex flex-col items-center space-y-4">
                    <h3 class="text-lg md:text-xl text-white font-techno glow-text underline-glow">Adn Laex</h3>
                    <img src="/img/products/burgers/adnlaex.png" alt="Hamburguesa Lab" class="h-48 md:h-72">
                    <p class="text-white italic text-sm md:text-md">"Hecha por: Javier Gómez"</p>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide" data-index="3">
            <div class="h-full flex items-center justify-center px-4 sm:px-10 md:px-52">
                <div id="slider4-reviews-wrapper" class="h-[400px] px-70 overflow-hidden flex items-center justify-center">
                    <div id="slider4-reviews" class="flex flex-col gap-5 w-full max-w-lg mx-auto">
                        @foreach($reviewsSlider as $review)
                            <x-review-card
                                user="{{ $review->user->name }}"
                                avatar="{{ $review->user->avatar ?? '/images/default-avatar.png' }}"
                                comments="{{ $review->comments }}"
                                rating="{{ $review->rating }}"
                                product="{{ $review->product->name ?? null }}"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    <!-- Enumeración lateral hamburguesa vertical -->
    <div class="z-30">
        <div id="burger-steps"
            class="hidden md:flex absolute top-1/2 left-16 transform -translate-y-1/2 flex-col items-center gap-6 z-20">
            <button data-go="0" class="burger-btn">
                <img src="/img/iconslider/tapa.png" class="step-part w-10 md:w-12 opacity-20 transition-all" />
            </button>
            <button data-go="1" class="burger-btn">
                <img src="/img/iconslider/cheese.png" class="step-part w-10 md:w-12 opacity-20 transition-all" />
            </button>
            <button data-go="2" class="burger-btn">
                <img src="/img/iconslider/carneburger.png" class="step-part w-10 md:w-12 opacity-20 transition-all" />
            </button>
            <button data-go="3" class="burger-btn">
                <img src="/img/iconslider/base.png" class="step-part w-10 md:w-12 opacity-20 transition-all" />
            </button>
        </div>
        <div id="burger-steps-mobile"
            class="md:hidden absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-6 z-30 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full">
            <button data-go="0" class="burger-btn">
                <img src="/img/iconslider/tapa.png" class="step-part w-8 opacity-20 transition-all" />
            </button>
            <button data-go="1" class="burger-btn">
                <img src="/img/iconslider/cheese.png" class="step-part w-8 opacity-20 transition-all" />
            </button>
            <button data-go="2" class="burger-btn">
                <img src="/img/iconslider/carneburger.png" class="step-part w-8 opacity-20 transition-all" />
            </button>
            <button data-go="3" class="burger-btn">
                <img src="/img/iconslider/base.png" class="step-part w-8 opacity-20 transition-all" />
            </button>
        </div>
    </div>
    </div>
</section>
