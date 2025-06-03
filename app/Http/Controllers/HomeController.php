<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviewsHome = Review::with('user', 'product')->latest()->take(9)->get();
        // Así el slider 4 tiene sus propias reviews
        $reviewsSlider = Review::with('user', 'product')->inRandomOrder()->take(6)->get();

        //Filtrar las 6 hamburguesas de la categoría Burgers
        $burgers = Product::where('category_id', 2)->take(6)->get();

        // Preparamos las reviews asociadas a cada burger
        $burgerReviews = [];
        foreach ($burgers as $burger) {
        $burgerReviews[$burger->id] = Review::where('product_id', $burger->id)
            ->with('user', 'product')
            ->orderBy('created_at', 'desc')
            ->get();
    }

        return view('home', [
            'reviewsHome' => $reviewsHome,
            'reviewsSlider' => $reviewsSlider,
            'products' => $burgers,
            'burgerReviews' => $burgerReviews
        ]);
    }
}
