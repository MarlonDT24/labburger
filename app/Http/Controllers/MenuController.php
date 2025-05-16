<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Luego reemplazarás esto con productos de la base de datos
        $products = [];
        $products_slider = [];

        return view('menu.index', compact('products', 'products_slider'));
    } 
}
