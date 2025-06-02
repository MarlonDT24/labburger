<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'index'])->name('users.index');
    Route::post('/perfil', [UserController::class, 'update'])->name('users.update');
});

//Rutas de registro/login
Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Rutas de la carta
Route::get('/carta', [MenuController::class, 'index'])->name('menu.index');

//Ruta para la seccion de nosotros
Route::get('/nosotros', [AboutController::class, 'index'])->name('about.index');

//Ruta para aumentar productos si eres admin
Route::resource('products', ProductController::class)->except(['edit', 'show'])->middleware('auth');

//Rutas de las reseñas
Route::resource('reviews', ReviewController::class);

//Rutas de los pedidos para los usuarios
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/process', [OrderController::class, 'process'])->name('orders.process');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/api/cart', function (Request $request) {
    session(['cart' => $request->cart]);
    return response()->json(['status' => 'ok']);
});
//Ruta para ver los pedidos del usuario registrado
Route::get('/mis-pedidos', [OrderController::class, 'userOrders'])->middleware('auth')->name('orders.user');
//Rutas de los pedidos para admins
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->middleware('auth')->name('orders.admin');

//Rutas para las reservas
Route::resource('reservations', ReservationController::class)->only(['create', 'store', 'show']);
//Rutas para las reservas de los usuarios registrados
Route::get('/mis-reservas', function () {
return view('reservations.user');
})->middleware('auth')->name('reservations.user');


//Rutas para el blog
Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/blog/category/{id}', [ArticleController::class, 'category'])->name('blog.category');
//Rutas para crear artículos (requieren autenticación y rol de admin)
Route::middleware('auth')->group(function () {
    Route::get('/blog/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/blog', [ArticleController::class, 'store'])->name('articles.store');
});

// Rutas para los comentarios (requieren login)
/* Route::middleware('auth')->group(function () {
    Route::post('/blog/{post}/comment', [CommentController::class, 'store'])->name('comments.store');
}); */
