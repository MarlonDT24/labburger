<footer class="grid grid-cols-1 md:grid-cols-[3fr_2fr] bg-blue-900 text-white">
    <!-- Columna izquierda para el contenido -->
    <div class="flex flex-col md:flex-row p-6 gap-8">
        <!-- Bloque 1 para Logo y enlaces -->
        <div class="w-full md:w-1/2">
            <div id="logoContainer" class="relative w-[110px] h-[80px] cursor-pointer">
                <a href={{ route('home') }}>
                    <img src="/img/logo.png" alt="Logo Labburger" class="absolute inset-0 w-full h-full object-contain m-auto" />
                </a>
            </div>
            <div class="mb-4">
                <p class="font-semibold mb-2 font-techno">Links:</p>
                <ul class="space-y-1 text-sm">
                    <li>&gt; <a href="#contacto" class="hover:text-blue-400 font-techno">Contactarnos</a></li>
                    <li>&gt; <a href="#nosotros" class="hover:text-blue-400 font-techno">Sobre nosotros</a></li>
                    <li>&gt; <a href="#carta" class="hover:text-blue-400 font-techno">Carta</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold mb-1 font-techno">Visítanos:</p>
                <p class="text-sm">Calle Jose María Haro, 63, Algirós, 46022 Valencia<br>Tel: +34 666 333 444</p>
            </div>
        </div>

        <!-- Bloque 2: Redes y horarios -->
        <div class="w-full md:w-1/2">
            <div class="flex space-x-6 mb-3 text-sm font-semibold">
                <a href="#" class="hover:text-red-400 underline">
                    <img src="/img/socialmedia/insta.png" alt="Logo instagram" class="h-10"/>
                </a>
                <a href="#" class="hover:text-red-400 underline">
                    <img src="/img/socialmedia/facebook.png" alt="Logo facebook" class="h-10"/>
                </a>
                <a href="#" class="hover:text-red-400 underline">
                    <img src="/img/socialmedia/x.png" alt="Logo X" class="h-10"/>
                </a>
            </div>
            <div class="text-sm space-y-1">
                <p><strong>Lunes - Jueves</strong></p>
                <p>12:00 - 15:30, 19:00 - 23:30</p>
                <p><strong>Viernes - Domingos</strong></p>
                <p>12:00 - 15:30, 19:00 - 02:30</p>
                <p class="font-bold mt-2">Abiertos días festivos</p>
            </div>
        </div>

    </div>

    <!-- Columna derecha: Google Maps -->
    <div class="bg-gray-400 flex flex-col items-center justify-center p-6">
        <h2 class="font-semibold mb-3 font-techno glow-text">Con lo fácil que es visitarnos:</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3120.706092797741!2d-0.35000000000000003!3d39.46500000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6048bf95f4ccbd%3A0x95a44f40ccafff6f!2sC.%20de%20Jos%C3%A9%20Mar%C3%ADa%20Haro%2C%2063%2C%20Algir%C3%B3s%2C%2046022%20Valencia!5e0!3m2!1ses!2ses!4v1234567890"
            width="100%" height="210" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="rounded-lg shadow-md w-full h-[240px] md:h-[300px] lg:h-[250px]">
        </iframe>
    </div>
</footer>