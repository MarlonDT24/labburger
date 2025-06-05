<nav id="nav-menu"
    class="hidden md:flex md:space-x-6 md:justify-start col-span-1 md:col-span-auto md:static absolute top-16 left-0 w-full bg-white md:w-auto md:bg-transparent md:top-auto md:left-auto flex-col md:flex-row text-center md:text-left shadow md:shadow-none z-40">

    <a href={{ route('home') }} class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Inicio</span>
    </a>
    <a href="{{ route('menu.index') }}" class="nav-link relative px-4 py-2 overflow-hidden block">
        <span class="relative z-10 font-techno">Carta</span>
    </a>
    <a href="{{ route('about.index') }}" class="nav-link relative px-4 py-2 overflow-hidden">
        <span class="relative z-10 font-techno">Nosotros</span>
    </a>
    @auth
            @if (Auth::user()->type === 'administrador')
                <a href="{{ route('articles.index') }}" class="nav-link relative px-4 py-2 overflow-hidden">
                    <span class="relative z-10 font-techno">Blog</span>
                </a>

                <a href="{{ route('monthburgers.index') }}" class="nav-link relative px-4 py-2 overflow-hidden">
                    <span class="relative z-10 font-techno">Propuestas de Hamburguesa del Mes</span>
                </a>
            @else
                <a href="{{ route('articles.index') }}" class="nav-link relative px-4 py-2 overflow-hidden">
                    <span class="relative z-10 font-techno">Blog</span>
                </a>
                <a href="{{ route('monthburgers.create') }}" class="nav-link relative px-4 py-2 overflow-hidden">
                    <span class="relative z-10 font-techno">Crear Hamburguesa del Mes</span>
                </a>
            @endif
        @else
            <a href="{{ route('articles.index') }}" class="nav-link relative px-4 py-2 overflow-hidden">
                <span class="relative z-10 font-techno">Blog</span>
            </a>
            <!-- Botón desactivado para invitados -->
            <div class="relative px-4 py-2 overflow-hidden text-gray-400">
                <span class="relative z-10 font-techno">Crear Hamburguesa del Mes</span>
                <div class="text-xs mt-1 text-blue-700">Regístrate para crear la Hamburguesa del Mes</div>
            </div>
        @endauth
</nav>



<div class="flex justify-center items-center px-4">
    <div id="logoContainer" class="relative w-[110px] h-[80px] cursor-pointer">
        <img src="/img/logo.png" alt="Logo Labburger" class="absolute inset-0 w-full h-full object-contain m-auto" />
    </div>
</div>

<div class="flex flex-row justify-end gap-15">
    <div class="hidden md:flex justify-end items-center space-x-5">
        @auth
            @if (Auth::user()->type === 'administrador')
                <x-button url="{{ route('orders.index') }}">Administrar Pedidos</x-button>
                <x-button url="{{ route('reservations.index') }}">Gestionar Mesas</x-button>
            @else
                <x-button url="{{ route('orders.create') }}" isPrimary="true">Realizar Pedido</x-button>
                <x-button url="{{ route('reservations.create') }}">Resevar Mesa</x-button>
            @endif
        @else
            <x-button url="{{ route('orders.create') }}" isPrimary="true">Realizar Pedido</x-button>
            <x-button url="{{ route('reservations.create') }}">Reservar Mesa</x-button>
        @endauth
    </div>

    <div class="flex justify-center items-center">
        @if (Auth::check())
        <!-- Botón de usuario con menu desplegable -->
        <div class="relative group">
            <button class="flex items-center space-x-2 text-gray-800 font-semibold focus:outline-none">
                <img src="{{ Auth::user()->avatar }}" alt="Avatar"
                    class="w-11 h-11 rounded-full object-cover border border-gray-600">
                <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
            </button>

            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                <a href="{{ route('users.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-600">Mi perfil</a>

                @if (Auth::user()->type === 'administrador')
                    <a href="{{ route('articles.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-600">Publicar Artículo</a>
                @else
                    <a href="{{ route('orders.user') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-600">Mis pedidos</a>
                    <a href="{{ route('reservations.user') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-600">Mis reservas</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-400">Cerrar sesión</button>
                </form>
            </div>
        </div>
    @else
        <div class="flex items-center space-x-3">
            <a href="{{ route('login') }}" class="relative text-blue-600 link-underline px-2 login-link font-techno">
                Iniciar sesión
            </a>
            <a href="{{ route('signup') }}" class="relative text-blue-600 link-underline px-2 login-link font-techno">
                Registrarse
            </a>
        </div>
    @endif
    </div>
</div>
