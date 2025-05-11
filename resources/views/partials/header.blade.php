<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <div class="max-w-[1900px] mx-auto px-2 py-4 grid grid-cols-3 items-center">
        <!-- Botón hamburguesa cuando sea responsive-->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        @include('partials.nav')
    </div>
</header>
