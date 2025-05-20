<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories', function (Request $request) {
    return Category::all();
});

Route::get('/products-by-category/{id}', function ($id) {
    return Product::where('category_id', $id)->get();
});
