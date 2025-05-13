{{-- Importaciones --}}
@if(request()->is('menu'))
    @vite('resources/js/menu.js')
@endif
@if(request()->is('login'))
    @vite('resources/js/login.js')
@endif
@if(request()->is('signup'))
    @vite('resources/js/signup.js')
@endif