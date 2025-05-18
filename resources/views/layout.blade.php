<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Api para la fuente futurista de la pagina web --}}
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <!-- VANTA.JS y THREE.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
    {{-- Este include es para llamar a las importaciones de javascript para que se renderize mejor --}}
    @include('includes.imports')
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">
    @include('partials.header')

    <main class="flex-1 pt-[100px]">
        @yield('content')
    </main>

    @include('partials.footer')

    <script type="module" src="{{ Vite::asset('resources/js/nav.js') }}"></script>
</body>
</html>
