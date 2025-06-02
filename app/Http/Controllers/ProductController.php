<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ya se visualizan los productos en el MenuController
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* No hace falta crear un formulario para añadir productos,
         ya que se hace desde el menú y con el metodo store() */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->rating = $request->input('rating');
        $product->allergens = $request->input('allergens');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Buscar el nombre de la categoría
            $category = Category::find($request->input('category_id'));
            $folder = strtolower($category->name); // ej: "Burgers" → "burgers"
            // Ruta completa
            $path = public_path("img/products/{$folder}");
            // Crear carpeta si no existe
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            // Mover archivo
            $file->move($path, $filename);
            $product->image = "/img/products/{$folder}/{$filename}";
        }
        $product->save();

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     return view('products.show', compact('product'));
    // }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name') ?? null;
        $product->description = $request->input('description') ?? null;
        $product->price = $request->input('price') ?? null;
        $product->rating = $request->input('rating') ?? null;
        $product->allergens = $request->input('allergens') ?? null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Buscar el nombre de la categoría
            $category = Category::find($request->input('category_id'));
            $folder = strtolower($category->name); //ej: "Burgers" → "burgers"
            // Ruta completa
            $path = public_path("img/products/{$folder}");
            // Crear carpeta si no existe
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            // Mover archivo
            $file->move($path, $filename);
            $product->image = "/img/products/{$folder}/{$filename}";
        }

        $product->save();

        // Como la petición es AJAX, devuelve una respuesta JSON
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'product' => $product,
            ]);
        }
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('menu.index');
    }
}
