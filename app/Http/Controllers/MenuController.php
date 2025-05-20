<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Luego reemplazarás esto con productos de la base de datos
        $products = [];
        $products_slider = Product::latest()->take(6)->get();
        $categories = Category::all();

        return view('menu.index', compact('categories', 'products_slider'));
    }
}
