@extends('layout')

@section('title', 'Crear Hamburguesa del Mes')

@section('content')
<!-- Hero -->
<section class="relative p-20 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
    <div class="max-w-7xl mx-auto px-4 text-left">
        <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">CREA LA HAMBURGUESA DEL MES!!</h1>
        <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Crea la Hamburguesa del Mes</p>
        <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">¡Desprende toda tu creatividad!</p>
    </div>
</section>

<div class="max-w-5xl mx-auto px-4 py-12">

    <h1 class="text-4xl font-techno mb-8 text-center text-blue-800 animate-fade-in-down">Crea tu Hamburguesa del Mes</h1>

    <div class="flex flex-col md:flex-row gap-10">
        <!-- Vista previa -->
        <div class="w-full md:w-1/2 flex justify-center items-center bg-gray-100 rounded-lg relative h-[500px]">
            <div id="burger-preview" class="relative w-[300px] h-[400px]">
                <!-- Las capas aparecerán aquí -->
            </div>
        </div>

        <!-- Formulario -->
        <div class="w-full md:w-1/2">
            <form action="{{ route('monthburgers.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="font-techno block mb-2">Nombre de la Hamburguesa</label>
                        <input type="text" name="name" required class="input-style">
                    </div>
                    <div>
                        <label class="font-techno block mb-2">Descripción Creativa</label>
                        <textarea name="description" rows="3" required class="input-style"></textarea>
                    </div>
                </div>

                @php
                    $ingredients = [
                        'Pan' => ['Clásico de hamburguesa', 'Brioche', 'Integral', 'Centeno', 'Semillas', 'Pan inferior'],
                        'Carne' => ['Ternera', 'Vaca madurada', 'Wagyu', 'Pollo crispy'],
                        'Quesos' => ['Cheddar', 'Emmental', 'Gouda', 'Mozzarella', 'Roquefort'],
                        'Salsas' => ['Salsa Labb', 'Salsa Korean', 'Salsa Mayolab', 'Salsa Mayolab Romero', 'Salsa BBQ', 'Salsa Trufada', 'Salsa al Whisky'],
                        'Verduras' => ['Lechuga', 'Tomate Frito', 'Cebolla Caramelizada', 'Cebolla Crispy', 'Cebolla Morada', 'Cebolla Encurtida', 'Pepinillo', 'Espinaca', 'Aguacate', 'Jalapeños', 'Coleslaw'],
                        'Condimentos' => ['Albahaca', 'Limón', 'Pimienta Negra', 'Miel'],
                    ];
                @endphp

                @foreach($ingredients as $category => $options)
                    <div>
                        <h2 class="text-2xl font-techno text-blue-700 mb-4">{{ $category }}</h2>
                        <div class="flex flex-wrap gap-4">
                            @foreach($options as $option)
                                <label class="cursor-pointer relative">
                                    <input type="checkbox" name="ingredients[{{ $category }}][]" value="{{ $option }}" class="hidden ingredient-checkbox" data-ingredient="{{ $option }}">
                                    <div class="px-4 py-2 border rounded-full transition bg-white text-blue-800 font-semibold hover:bg-blue-100">
                                        {{ $option }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn-oferta text-xl w-full md:w-1/2">Crear Hamburguesa</button>
                </div>
            </form>
        </div>

    </div>
        {{-- <form action="{{ route('monthburgers.store') }}" method="POST" class="space-y-8">
            @csrf

            Nombre y descripción
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-techno block mb-2">Nombre de la Hamburguesa</label>
                    <input type="text" name="name" required class="input-style">
                </div>
                <div>
                    <label class="font-techno block mb-2">Descripción Creativa</label>
                    <textarea name="description" rows="3" required class="input-style"></textarea>
                </div>
            </div>

            Ingredientes
            <div class="grid grid-cols-1 gap-10">

                @php
                    $ingredients = [
                        'Pan' => ['Clásico de hamburguesa', 'Brioche', 'Integral', 'Centeno', 'Semillas'],
                        'Carne' => ['Ternera', 'Vaca madurada', 'Wagyu', 'Pollo crispy'],
                        'Quesos' => ['Cheddar', 'Emmental', 'Gouda', 'Mozzarella', 'Roquefort'],
                        'Salsas' => ['Salsa Labb', 'Salsa Korean', 'Salsa Mayolab', 'Salsa Mayolab Romero', 'Salsa BBQ', 'Salsa Trufada', 'Salsa al Whisky'],
                        'Verduras' => ['Lechuga', 'Tomate Frito', 'Cebolla Caramelizada', 'Cebolla Crispy', 'Cebolla Morada', 'Cebolla Encurtida', 'Pepinillo', 'Espinaca', 'Aguacate', 'Jalapeños', 'Coleslaw'],
                        'Condimentos' => ['Albahaca', 'Limón', 'Pimienta Negra', 'Miel'],
                    ];
                @endphp

                @foreach($ingredients as $category => $options)
                <div>
                    <h2 class="text-2xl font-techno text-blue-700 mb-4">{{ $category }}</h2>
                    <div class="flex flex-wrap gap-4">
                        @foreach($options as $option)
                            <label class="cursor-pointer relative">
                                <input type="checkbox" name="ingredients[{{ $category }}][]" value="{{ $option }}" class="hidden ingredient-checkbox">
                                <div class="px-4 py-2 border rounded-full transition bg-white text-blue-800 font-semibold hover:bg-blue-100">
                                    {{ $option }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>

            Botón de envío
            <div class="text-center">
                <button type="submit" class="btn-oferta text-xl w-full md:w-1/2">Crear Hamburguesa</button>
            </div>
        </form> --}}
    </div>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/monthburger.js') }}"></script>
@endpush

