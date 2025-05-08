<!-- Parte 1: Burbujas flotantes (versión estática temporal) -->
<div class="relative w-full h-[400px] sm:h-[500px] lg:h-[600px] mb-16">
    <div class="absolute p-4 bg-white rounded-xl shadow-lg w-[90%] sm:w-[280px] animate-float0"
         style="top: 20%; left: 10%;">
        <div class="font-semibold text-gray-800 text-sm sm:text-base">Lucía Martínez</div>
        <div class="text-yellow-400 mb-1 text-sm">★★★★★</div>
        <p class="text-xs sm:text-sm text-gray-600 italic">“¡La mejor hamburguesa de queso que he probado en Valencia!”</p>
        <img src="/images/hamburguesa1.png" alt="Producto" class="h-10 w-10 sm:h-12 sm:w-12 mt-2 rounded object-cover">
    </div>
    <div class="absolute p-4 bg-white rounded-xl shadow-lg w-[90%] sm:w-[280px] animate-float1"
         style="top: 45%; left: 60%;">
        <div class="font-semibold text-gray-800 text-sm sm:text-base">Miguel Torres</div>
        <div class="text-yellow-400 mb-1 text-sm">★★★★☆</div>
        <p class="text-xs sm:text-sm text-gray-600 italic">“La tarta de queso estaba muy buena, aunque la base un poco dura.”</p>
        <img src="/images/postres.png" alt="Producto" class="h-10 w-10 sm:h-12 sm:w-12 mt-2 rounded object-cover">
    </div>
    <div class="absolute p-4 bg-white rounded-xl shadow-lg w-[90%] sm:w-[280px] animate-float2"
         style="top: 70%; left: 35%;">
        <div class="font-semibold text-gray-800 text-sm sm:text-base">Ana Delgado</div>
        <div class="text-yellow-400 mb-1 text-sm">★★★★★</div>
        <p class="text-xs sm:text-sm text-gray-600 italic">“Probé el batido de Oreo y fue como un postre líquido. ¡Impresionante!”</p>
        <img src="/images/bebidas.png" alt="Producto" class="h-10 w-10 sm:h-12 sm:w-12 mt-2 rounded object-cover">
    </div>
</div>

<!-- Parte 2: Mosaico con hover zoom -->
<div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
    <div class="bg-gray-50 rounded-lg shadow hover:scale-105 transform transition-all p-4 sm:p-6 relative group">
        <div class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 text-xs font-semibold rounded-bl">5 estrellas</div>
        <div class="flex items-center mb-4">
            <img src="/images/hamburguesa1.png" alt="Producto" class="h-14 w-14 sm:h-16 sm:w-16 rounded mr-3">
            <div>
                <p class="text-base sm:text-lg font-semibold">Lucía Martínez</p>
                <div class="text-yellow-400 text-sm">★★★★★</div>
            </div>
        </div>
        <p class="text-gray-700 text-sm">“¡La mejor hamburguesa de queso que he probado en Valencia!”</p>
    </div>

    <div class="bg-gray-50 rounded-lg shadow hover:scale-105 transform transition-all p-4 sm:p-6 relative group">
        <div class="absolute top-0 right-0 bg-yellow-500 text-white px-2 py-1 text-xs font-semibold rounded-bl">4 estrellas</div>
        <div class="flex items-center mb-4">
            <img src="/images/postres.png" alt="Producto" class="h-14 w-14 sm:h-16 sm:w-16 rounded mr-3">
            <div>
                <p class="text-base sm:text-lg font-semibold">Miguel Torres</p>
                <div class="text-yellow-400 text-sm">★★★★☆</div>
            </div>
        </div>
        <p class="text-gray-700 text-sm">“La tarta de queso estaba muy buena, aunque la base un poco dura.”</p>
    </div>

    <div class="bg-gray-50 rounded-lg shadow hover:scale-105 transform transition-all p-4 sm:p-6 relative group">
        <div class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 text-xs font-semibold rounded-bl">5 estrellas</div>
        <div class="flex items-center mb-4">
            <img src="/images/bebidas.png" alt="Producto" class="h-14 w-14 sm:h-16 sm:w-16 rounded mr-3">
            <div>
                <p class="text-base sm:text-lg font-semibold">Ana Delgado</p>
                <div class="text-yellow-400 text-sm">★★★★★</div>
            </div>
        </div>
        <p class="text-gray-700 text-sm">“Probé el batido de Oreo y fue como un postre líquido. ¡Impresionante!”</p>
    </div>
</div>
