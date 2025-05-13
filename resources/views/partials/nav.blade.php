<nav id="nav-menu"
    class="hidden md:flex md:space-x-6 md:justify-start col-span-1 md:col-span-auto md:static absolute top-16 left-0 w-full bg-white md:w-auto md:bg-transparent md:top-auto md:left-auto flex-col md:flex-row text-center md:text-left shadow md:shadow-none z-40">

    <a href={{ route('home') }} class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Inicio</span>
    </a>
    <a href="{{ route('menu.index') }}" class="nav-link relative px-4 py-2 overflow-hidden block">
        <span class="relative z-10 font-techno">Carta</span>
    </a>
    <a href="#nosotros" class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Nosotros</span>
    </a>
    <a href="#blog" class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Blog</span>
    </a>
    <a href="#contacto" class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Contactanos</span>
    </a>
</nav>

<div class="flex justify-center items-center  px-4">
    <div id="logoContainer" class="relative w-[110px] h-[80px] cursor-pointer">
        <img src="/img/logo.png" alt="Logo Labburger" class="absolute inset-0 w-full h-full object-contain m-auto" />
    </div>
</div>

<div class="flex flex-row justify-end gap-15">
    <div class="hidden md:flex justify-end items-center space-x-5">
        <x-button url="/realizar-pedido" isPrimary="true">Realizar Pedido</x-button>
        <x-button url="/reservar-mesa">Resevar Mesa</x-button>
    </div>

    <div class="flex justify-center items-center">
        @if (Auth::check())
            <!-- Botón de usuario con dropdown -->
            <div class="relative group">
                <button class="flex items-center space-x-2 text-gray-800 font-semibold focus:outline-none">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.657 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                </button>

                <!-- Dropdown -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md hidden group-hover:block z-50">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Mi perfil</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Mis pedidos</a>
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Cerrar
                            sesión</button>
                    </form>
                </div>
            </div>
        @else
            <div class="flex items-center space-x-3">
                <a href="{{ route('login') }}"
                    class="relative text-blue-600 link-underline px-2 login-link font-techno">
                    Iniciar sesión
                </a>
                <a href="{{ route('signup') }}"
                    class="relative text-blue-600 link-underline px-2 login-link font-techno">
                    Registrarse
                </a>
            </div>
        @endauth
</div>

</div>