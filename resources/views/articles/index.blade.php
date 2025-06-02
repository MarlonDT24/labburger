@extends('layout')

@section('title', 'Blog')

@section('content')
<div class="flex flex-col md:flex-row max-w-7xl mx-auto py-16 px-4 gap-10">
    <!-- Artículos -->
    <div class="w-full md:w-3/4 space-y-10">
        @foreach ($articles as $article)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-500 hover:scale-105">

            <!-- Imagen -->
            <div class="relative group">
                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-80 object-cover">
            </div>

            <!-- Subtítulos -->
            <div class="px-8 py-4">
                <div class="flex flex-wrap text-sm text-gray-500 gap-4 mb-4">
                    <span>By - {{ $article->user?->name ?? 'Autor desconocido' }}</span>
                    <span>Fecha: {{ $article->published_at?->format('d-m-Y') }}</span>
                    <span class="cursor-pointer comments-toggle text-red-500" data-article="{{ $article->id }}">
                        Comentarios: ({{ $article->comments->count() }})
                    </span>
                    <span class="text-red-600 font-semibold">{{ $article->category->name }}</span>
                </div>

                <!-- Título -->
                <h2 class="text-3xl font-bold mb-4">{{ $article->title }}</h2>

                <!-- Contenido (limitado) -->
                <p class="text-gray-700 leading-relaxed">{{ Str::limit($article->content, 300) }}</p>

                <!-- Formulario de Comentario (solo si logueado) -->
                @auth
                <div class="mt-6 relative">
                    <textarea id="comment-input-{{ $article->id }}" class="w-full p-3 border rounded" placeholder="Escribe un comentario..."></textarea>
                    <button class="mt-2 bg-red-600 text-white px-4 py-2 rounded submit-comment" data-article="{{ $article->id }}">Publicar</button>
                    <div id="spinner-{{ $article->id }}" class="hidden absolute right-0 top-0 mt-2 mr-2">
                        <div class="border-4 border-red-600 border-t-transparent rounded-full w-6 h-6 animate-spin"></div>
                    </div>
                </div>
                @endauth

                <!-- Lista de Comentarios -->
                <div id="comments-section-{{ $article->id }}" class="hidden mt-6 space-y-4">
                    @foreach ($article->comments->sortByDesc('created_at') as $comment)
                    <div class="p-4 bg-gray-100 rounded">
                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Sidebar fijo -->
    <div class="w-full md:w-1/4 sticky top-28">
        <!-- Categorías -->
        <div class="bg-white rounded-xl shadow-lg mb-10 p-6">
            <h3 class="text-xl font-bold mb-4">Categorías</h3>
            <ul class="space-y-3">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('blog.category', $category->id) }}" class="flex justify-between items-center px-3 py-2 rounded
                        {{ request()->is('blog/category/'.$category->id) ? 'bg-red-100 text-red-600 font-semibold' : 'hover:bg-gray-100' }}">
                        <span>{{ $category->name }}</span>
                        <span>{{ $category->articles_count }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Información del Gestor -->
        <div class="bg-white rounded-xl shadow-lg p-6 text-center">
            <img src="{{ asset('img/admin.jpg') }}" class="w-32 h-32 mx-auto rounded-full mb-4">
            <h3 class="text-xl font-bold mb-2">Administrador</h3>
            <p class="text-gray-600 text-sm">Encargado de gestionar los artículos y mantenerte al día de las novedades.</p>
        </div>
    </div>
</div>
@endsection
