@extends('layout')

@section('title', 'Propuestas de Hamburguesa del Mes')

@section('content')
<section class="bg-gray-300 min-h-screen">
    <div class="max-w-6xl mx-auto py-12">
       <h1 class="text-4xl font-bold text-blue-800 mb-10 font-techno text-center">Propuestas Recibidas</h1>

       @if($monthburger->isEmpty())
          <div class="text-center text-gray-600 text-xl py-20">
             "Todavía no hay propuestas para mostrar"
          </div>
       @else
          <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
             @foreach ($monthburger as $proposal)
                <div class="relative bg-gradient-to-b from-white to-gray-100 p-6 rounded-3xl shadow-xl border border-gray-200 hover:scale-105 transition-transform duration-300">

                    <!-- Botón X decorado -->
                    <form action="{{ route('monthburgers.destroy', $proposal->id) }}" method="POST" class="absolute top-4 right-4" onsubmit="return confirm('¿Eliminar esta propuesta?')">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-full bg-red-500 hover:bg-red-700 text-white text-xl shadow-md transition duration-200">
                          &times;
                       </button>
                    </form>

                    <div class="mb-4">
                       <p class="text-sm text-gray-500">Propuesto por: <span class="font-bold text-blue-700">{{ $proposal->user->name ?? 'Anónimo' }}</span></p>
                    </div>

                    <h2 class="text-2xl text-center font-bold text-blue-800 mb-3 font-techno">"{{ $proposal->name }}"</h2>

                    <p class="text-center text-gray-600 mb-5 px-2">{{ $proposal->description }}</p>

                    <div class="mt-4 text-center">
                       <a href="{{ route('monthburgers.show', $proposal->id) }}" class="text-center bg-blue-700 hover:bg-blue-900 text-white px-6 py-2 rounded-full shadow-lg transition duration-300 font-semibold text-sm">
                          Ver Propuesta
                       </a>
                    </div>

                </div>
             @endforeach
          </div>
       @endif
    </div>
</section>
@endsection
