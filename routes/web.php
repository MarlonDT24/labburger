<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

//Rutas de registro/login
Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Rutas de la carta
Route::get('/carta', [MenuController::class, 'index'])->name('menu.index');
//Ruta para aumentar productos si eres admin
Route::resource('products', ProductController::class)->except(['edit', 'show'])->middleware('auth');

//Rutas de las reseñas
Route::resource('reviews', ReviewController::class);
