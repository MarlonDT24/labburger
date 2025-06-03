@extends('layout')

@section('title', 'Blog')

@section('content')
    <section class="bg-gray-300 w-full">
        <div class="flex flex-col md:flex-row max-w-7xl mx-auto py-16 px-4 gap-10">
            <!-- Artículos -->
            <div class="w-full md:w-3/4 space-y-10">
                @if (isset($category))
                    <div class="mb-10">
                        <h2 class="text-3xl">
                            <span class="font-bold text-blue-800 font-techno">Filtrando por categoría: </span>
                            <span class="font-bold text-black">{{ $category->name }}</span>
                        </h2>
                        <a href="{{ route('articles.index') }}" class="text-blue-600 hover:underline">Ver todos los
                            artículos</a>
                    </div>
                @endif
                @foreach ($articles as $article)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-500 hover:scale-105 relative">
                        @auth
                            @if (Auth::user()->type === 'administrador')
                                <div class="absolute top-3 right-3 flex space-x-2 z-10">
                                    <button class="toggle-edit bg-blue-800 text-white px-3 py-1 rounded text-sm"
                                        data-id="{{ $article->id }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="delete-article bg-red-600 text-white px-3 py-1 rounded text-sm"
                                        data-id="{{ $article->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endif
                        @endauth

                        <!-- Imagen -->
                        <div class="relative group">
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                                class="w-full h-80 object-cover">
                        </div>

                        <!-- Subtítulos -->
                        <div class="px-8 py-4">
                            <div class="flex flex-wrap text-sm text-gray-500 gap-4 mb-4">
                                <span>By - {{ $article->user?->name ?? 'Autor desconocido' }}</span>
                                <span>Fecha: {{ $article->published_at?->format('d-m-Y') }}</span>
                                <span id="comment-count-{{ $article->id }}"
                                    class="cursor-pointer comments-toggle text-blue-700" data-article="{{ $article->id }}">
                                    Comentarios: ({{ $article->comments->count() }})
                                </span>
                                <span class="text-blue-700 font-semibold">{{ $article->category->name }}</span>
                            </div>

                            <h2 class="editable-title text-3xl font-bold mb-4 text-blue-800 glow-blue"
                                data-id="{{ $article->id }}" contenteditable="false" style="transition: 0.3s">
                                {{ $article->title }}
                            </h2>

                            <p class="editable-content text-gray-700 leading-relaxed" data-id="{{ $article->id }}"
                                contenteditable="false" style="transition: 0.3s">
                                {{ $article->content }}
                            </p>

                            <!-- Formulario de Comentario o Mensaje para iniciar sesión -->
                            <h3 class="mt-4 text-xl font-bold text-blue-800">Comentarios:</h3>
                            @auth
                                <div class="mt-2 relative">
                                    <textarea id="comment-input-{{ $article->id }}" class="w-full p-3 border rounded"
                                        placeholder="Escribe un comentario..."></textarea>
                                    <button
                                        class="mt-2 bg-blue-700 text-white px-4 py-2 rounded submit-comment hover:bg-blue-900"
                                        data-article="{{ $article->id }}">Publicar</button>
                                    <div id="spinner-{{ $article->id }}" class="hidden absolute right-0 top-0 mt-2 mr-2">
                                        <div
                                            class="border-4 border-blue-700 border-t-transparent rounded-full w-6 h-6 animate-spin">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="mt-6 bg-blue-100 p-4 rounded text-center">
                                    <p class="mb-4 text-blue-800 font-semibold">Para comentar debes iniciar sesión.</p>
                                    <a href="{{ route('loginForm') }}"
                                        class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Iniciar Sesión</a>
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
                    <h3 class="text-xl font-bold mb-4 font-techno text-blue-700">Categorías</h3>
                    <ul class="space-y-3">
                        @foreach ($categories as $categoryLoop)
                            <li>
                                @php
                                    $isActive = isset($category) && $category->id == $categoryLoop->id;
                                @endphp
                                <a href="{{ $isActive ? route('articles.index') : route('blog.category', $categoryLoop->id) }}"
                                    class="flex justify-between items-center px-3 py-2 rounded
                            {{ $isActive ? 'bg-blue-800 text-white font-semibold' : 'hover:bg-gray-300' }}">
                                    <span>{{ $categoryLoop->name }}</span>
                                    <span>{{ $categoryLoop->articles_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Información del Gestor -->
                <div class="bg-blue-800 rounded-xl shadow-lg p-6 text-center">
                    <img src="{{ asset('img/blog/administrator/admin.jpg') }}" class="w-42 h-42 mx-auto rounded-full mb-4">
                    <h3 class="text-xl text-white font-bold mb-2">Administrador</h3>
                    <p class="text-gray-300 text-sm">Encargado de gestionar los artículos y mantenerte al día de las
                        novedades.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/article.js') }}"></script>
@endpush
