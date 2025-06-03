@extends('layout')

@section('title', 'Crear Hamburguesa del Mes')

@section('content')
    <!-- Hero -->
    <section class="relative p-20 bg-cover bg-center bg-no-repeat bg-[url('/public/img/fondoslider.jpg')]">
        <div class="max-w-7xl mx-auto px-4 text-left">
            <h1 class="text-5xl font-bold text-white font-techno glow-text animate-fade-in">CREA LA HAMBURGUESA DEL MES!!
            </h1>
            <p class="text-sm text-gray-400 mt-2 font-techno animate-fade-in delay-200">Inicio > Crea la Hamburguesa del Mes
            </p>
            <p class="text-lg text-blue-200 italic mt-4 animate-fade-in delay-500">¡Desprende toda tu creatividad!</p>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-4 py-12">

        <div class="flex flex-col md:flex-row gap-16">

            <div class="w-full md:w-1/2 flex flex-col justify-start items-center">
                <!-- Sticky -->
                <div class="sticky top-32 w-full flex flex-col justify-start items-center">

                    <!-- Título sticky junto con la card -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-techno text-blue-800 glow-blue">Preview de la Hamburguesa</h2>
                    </div>
                    <!-- Card de la burger -->
                    <div
                        class="bg-cover bg-center bg-no-repeat bg-[url('/public/img/ingredients/fondoburger.jpg')] rounded-lg h-[500px] w-full flex justify-center items-center">
                        <div id="burger-preview" class="relative w-[280px] h-[380px]">
                            <!-- Aqui aparecen las capas -->
                        </div>
                    </div>

                </div>

            </div>

            <!-- Formulario -->
            <div class="w-full md:w-1/2">
                <h2 class ="text-2xl font-techno text-blue-800 mb-6 glow-blue">Caracteristicas de la Hamburguesa</h2>
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
                            'Pan' => [
                                'Clásico de hamburguesa',
                                'Brioche',
                                'Integral',
                                'Centeno',
                                'Semillas',
                            ],
                            'Ingredientes' => [
                                'Carne' => ['Ternera', 'Vaca madurada', 'Wagyu', 'Pollo crispy'],
                                'Quesos' => ['Cheddar', 'Emmental', 'Gouda', 'Mozzarella', 'Roquefort'],
                                'Verduras' => [
                                    'Lechuga',
                                    'Cebolla Caramelizada',
                                    'Cebolla Crispy',
                                    'Cebolla Morada',
                                ],
                            ],
                        ];
                    @endphp

                    @foreach ($ingredients as $category => $options)
                        <div>
                            <h2 class="text-2xl font-techno text-blue-700 mb-4">{{ $category }}</h2>
                            <div class="flex flex-wrap gap-4">
                                @if ($category === 'Pan')
                                    @foreach ($options as $option)
                                        <label class="cursor-pointer relative">
                                            <input type="checkbox" name="ingredients[{{ $category }}][]"
                                                value="{{ $option }}" class="hidden ingredient-checkbox"
                                                data-category="{{ $category }}" data-ingredient="{{ $option }}"
                                                @if ($option === 'Pan inferior') checked disabled @endif>
                                            <div
                                                class="px-4 py-2 border rounded-full transition bg-white text-blue-800 font-semibold">
                                                {{ $option }}
                                            </div>
                                        </label>
                                    @endforeach
                                @else
                                    @foreach ($options as $subcat => $suboptions)
                                        <div class="w-full mt-2 mb-1 font-bold text-blue-500">{{ $subcat }}</div>
                                        @foreach ($suboptions as $option)
                                            <label class="cursor-pointer relative">
                                                <input type="checkbox" name="ingredients[{{ $subcat }}][]"
                                                    value="{{ $option }}" class="hidden ingredient-checkbox"
                                                    data-category="{{ $subcat }}" data-ingredient="{{ $option }}">
                                                <div
                                                    class="px-4 py-2 border rounded-full transition bg-white text-blue-800 font-semibold hover:bg-blue-100">
                                                    {{ $option }}
                                                </div>
                                            </label>
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="text-center bg-blue-800 text-white p-3 rounded-lg mt-8">
                        <button type="submit" class="btn-oferta  text-xl w-full md:w-1/2">Enviar Propuesta</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/monthburger.js') }}"></script>
@endpush
