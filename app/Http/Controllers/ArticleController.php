<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['user', 'category', 'comments'])->get();
        $categories = ArticleCategory::withCount('articles')->get();
        return view('articles.index', compact('articles', 'categories'));
    }
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('articles.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $article = new Article();
        if (Auth::check()) {
            $article->user_id = Auth::id();
        }
        $article->category_id = $request->input('category_id');
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Buscar el nombre de la categoría
            $category = ArticleCategory::find($request->input('category_id'));
            $folder = strtolower(Str::slug($category->name, '_')); // ej: "Burgers" → "burgers"
            // Ruta completa
            $path = public_path("img/blog/{$folder}");
            // Crear carpeta si no existe
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            // Mover archivo
            $file->move($path, $filename);
            $article->image = "/img/blog/{$folder}/{$filename}";
        }
        $article->save();
        return redirect()->route('articles.index');
    }
    
    public function show(string $id)
    {
        //
    }
    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $data['slug'] = Str::slug($data['title']);

        $article->update($data);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
         $article->delete();
        return redirect()->route('blog.index');
    }

    public function category($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $articles = Article::where('category_id', $category->id)->get();
        $categories = ArticleCategory::all();
        return view('articles.index', compact('articles', 'categories'));
    }
}
