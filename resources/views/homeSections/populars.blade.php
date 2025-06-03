<section class="bg-[#0A199F] text-white py-16 px-14">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <!-- Slider hamburguesas -->
        <div class="relative p-6 rounded overflow-hidden h-[500px] bg-gray-400" id="burgerCard">
            <button id="prevBurger"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded-l z-10">◀</button>

            <div id="burgerSlider" class="relative w-full h-full">
                @foreach ($products as $index => $product)
                    <div
                        class="absolute inset-0 transition-all duration-500 burger-slide {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ $product->image }}'); filter: brightness(0.7);"></div>

                        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-10">
                            <h3 class="text-3xl font-bold mb-3 font-techno">{{ $product->name }}</h3>
                            <div class="font-semibold text-lg">{{ number_format($product->price, 2) }} €</div>
                            <div class="text-sm text-white mb-4">{{ $product->description ?? 'Sin descripción' }}</div>
                            <button
                                class="order-now-btn inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-600 transition font-techno"
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ number_format($product->price, 2, '.', '') }}"
                                data-image="{{ $product->image }}">
                                Hacer Pedido
                            </button>   
                        </div>
                    </div>
                @endforeach
            </div>

            <button id="nextBurger"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded-r z-10">▶</button>
        </div>

        <!-- Información lateral -->
        <div class="space-y-27 mt-10">
            <h2 class="text-3xl font-bold mb-3 font-techno">LAS POPULARES DE LA CASA</h2>
            <p class="mb-6">Nuestras hamburguesas crean una gran diferencia entre el público por su gran calidad y
                sabor.</p>
            <p class="italic mb-6">Y no lo decimos nosotros...</p>

            {{-- Las reviews van asociadas a cada burger --}}
            <div class="relative" id="reviewContainer">
                @foreach ($products as $index => $product)
                    <div
                        class="review-group absolute inset-0 transition-all duration-500 {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                        @if (count($burgerReviews[$product->id]) > 0)
                            <div class="relative h-48 overflow-hidden">
                                @foreach ($burgerReviews[$product->id] as $rIndex => $review)
                                    <div
                                        class="absolute inset-0 transition-all duration-500 review-slide {{ $rIndex === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                                        <x-review-card user="{{ $review->user->name }}"
                                            avatar="{{ $review->user->avatar ?? '/images/default-avatar.png' }}"
                                            comments="{{ $review->comments }}" rating="{{ $review->rating }}"
                                            product="{{ $review->product->name ?? null }}" />
                                    </div>
                                @endforeach
                            </div>

                            <!-- Botón para pasar de review manualmente -->
                            <button
                                class="next-review absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-full
                                bg-white text-blue-700 font-bold p-2 rounded-full shadow-lg z-20 text-xl transition-all duration-300
                                hover:bg-blue-700 hover:text-white hover:scale-110">⬇</button>
                        @else
                            <div class="h-48 flex items-center justify-center">
                                <p class="italic text-gray-300 text-lg">"Todavía no existen reseñas para esta
                                    hamburguesa"</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
