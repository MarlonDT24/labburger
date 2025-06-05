@extends('layout')

@section('title', 'Propuesta Enviada')

@section('content')
<section class="bg-gray-300">
    <div class="max-w-3xl mx-auto py-12 text-center">
        @if (Auth::user()->type === 'cliente')
            <h1 class="text-3xl font-bold mb-6">¡Tu propuesta ha sido enviada!</h1>
        @endif

        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-8 rounded-lg shadow-lg mb-10">
            <h2 class="text-3xl text-white font-bold mb-4">{{ $monthburger->name }}</h2>
            <p class="text-blue-100 italic">{{ $monthburger->description }}</p>
        </div>

        @php
            $ingredients = json_decode($monthburger->ingredients, true);
        @endphp

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-4">
                        <p class="text-sm text-gray-500">Propuesto por: <span class="font-bold text-blue-700">{{ $proposal->user->name ?? 'Anónimo' }}</span></p>
            </div>
            <h3 class="text-2xl font-techno text-blue-700 mb-6 glow-blue">Ingredientes Seleccionados</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                @foreach ($ingredients as $category => $items)
                    <div class="pl-24">
                        <h4 class="text-lg font-semibold text-blue-500 mb-2">{{ $category }}</h4>
                        <ul class="list-disc list-inside text-blue-800">
                            @foreach ($items as $ingredient)
                                <li>{{ $ingredient }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn-oferta mt-8">Volver al Inicio</a>
    </div>
</section>
@endsection
