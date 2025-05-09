<nav id="nav-menu" class="hidden md:flex md:space-x-6 md:justify-start col-span-1 md:col-span-auto md:static absolute top-16 left-0 w-full bg-white md:w-auto md:bg-transparent md:top-auto md:left-auto flex-col md:flex-row text-center md:text-left shadow md:shadow-none z-40">
    <a href={{ route('home') }} class="py-2 px-4 hover:text-red-500 block">Inicio</a>
    <a href={{ route('menu.index') }} class="py-2 px-4 hover:text-red-500 block">Carta</a>
    <a href="#nosotros" class="py-2 px-4 hover:text-red-500 block">Nosotros</a>
    <a href="#blog" class="py-2 px-4 hover:text-red-500 block">Blog</a>
    <a href="#contacto" class="py-2 px-4 hover:text-red-500 block">Contactar</a>
</nav>

<div class="text-center">
    <div class="text-xl font-bold">LAB BURGER</div>
</div>

<div class="hidden md:flex justify-end space-x-5 items-center relative">
    <a href="/pedido" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Realizar Pedido</a>
    <a href="/reserva" class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition">Reservar</a>
    @if(Auth::check())
        <!-- Botón de usuario con dropdown -->
        <div class="relative group">
            <button class="flex items-center space-x-2 text-gray-800 font-semibold focus:outline-none">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.657 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
            </button>

            <!-- Dropdown -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md hidden group-hover:block z-50">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Mi perfil</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Mis pedidos</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Cerrar sesión</button>
                </form>
            </div>
        </div>
    @else
        <a href={{ route('login') }} class="text-blue-600 hover:underline">Iniciar sesión</a>
        <a href={{ route('signup') }} class="text-blue-600 hover:underline">Registrarse</a>
    @endauth
</div>
