@extends('layout')

@section('title', 'Crear Artículo')

@section('content')
<div class="max-w-4xl mx-auto py-16">
    <h2 class="text-3xl font-bold mb-6">Nuevo Artículo</h2>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        <div>
            <label for="category_id" class="font-semibold">Categoría</label>
            <select name="category_id" id="category_id" class="input-style" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="font-semibold">Título</label>
            <input type="text" name="title" id="title" class="input-style" required>
        </div>

        <div>
            <label for="content" class="font-semibold">Contenido</label>
            <textarea name="content" id="content" rows="6" class="input-style" required></textarea>
        </div>


        <div>
            <label for="published_at" class="font-semibold">Fecha de publicación</label>
            <input type="date" name="published_at" id="published_at" class="input-style">
        </div>

        <div>
            <label for="image" class="font-semibold">Imagen</label>
            <input type="file" name="image" id="image" class="input-style">
        </div>

        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-700">
            Publicar Artículo
        </button>
    </form>
</div>
@endsection
