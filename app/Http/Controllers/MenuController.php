<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Luego reemplazarás esto con productos de la base de datos
        $products = [];
        $products_slider = [];
        $categories = Category::all();

        return view('menu.index', compact('products', 'products_slider', 'categories'));
    }
}
