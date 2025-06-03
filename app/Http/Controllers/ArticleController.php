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
        $articles = Article::with(['user', 'category', 'comments'])->orderBy('published_at', 'desc')->get();
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
        $article->published_at = now();

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
        //No se necesita ya que se edita con AJAX
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //No se necesita ya que se actualiza con AJAX
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //No se necesita ya que se elimina con AJAX
    }

    public function category($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $articles = Article::where('category_id', $category->id)->orderBy('published_at', 'desc')->with(['user', 'category', 'comments'])->get();
        $categories = ArticleCategory::withCount('articles')->get();
        return view('articles.index', compact('articles', 'categories', 'category'));
    }

    public function ajaxUpdate(Request $request, Article $article)
    {
        $article->title = $request->title ?? $article->title;
        $article->content = $request->content ?? $article->content;
        $article->category_id = $request->category_id ?? $article->category_id;
        $article->save();

        return response()->json(['success' => true]);
    }

    public function ajaxDelete(Article $article)
    {
        $article->delete();
        return response()->json(['success' => true]);
    }
}
