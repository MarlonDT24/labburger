<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('orders.create', compact('products', 'categories'));
    }

    /**
     *.
     */
    public function store(Request $request)
    {
        // Por ahora se guarda cada pedido en el metodo process()
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Solo se permite modicar algunos datos si aún está pendiente
        if ($order->state !== 'pendiente') {
            return redirect()->route('orders.show', $order);
        }

        // Se pueden asignar nuevos datos
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->address = $request->input('address');
        $order->portal = $request->input('portal');
        $order->door = $request->input('door');
        $order->notes = $request->input('notes');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->delivery_method = $request->input('delivery_method', $order->delivery_method);
        $order->save();

        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->product()->detach(); // Desvincular productos
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('orders.create');
        }
        // Se obtiene el usuario logueado o null
        $user = Auth::user();

        return view('orders.checkout', compact('cart', 'user'));
    }

    public function process(Request $request)
    {
        // Obtener carrito (puede venir del session o request)
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('orders.checkout');
        }

        // Crear pedido
        $order = new Order();
        $order->user_id = Auth::check() ? Auth::id() : null;
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->address = $request->input('address');
        $order->portal = $request->input('portal');
        $order->door = $request->input('door');
        $order->notes = $request->input('observations');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->payment_method = $request->input('payment_method');
        $order->state = 'pendiente';
        $order->date = Carbon::now();
        switch ($request->input('payment_method')) {
            case 'credit_card':
                $order->card_number = $request->input('card_number');
                $order->card_name = $request->input('card_name');
                $order->card_expiration = $request->input('card_expiration');
                $order->card_cvc = $request->input('card_cvc');
                break;

            case 'paypal':
                $order->paypal_email = $request->input('paypal_email');
                break;

            case 'bank':
                $order->bank_owner = $request->input('bank_owner');
                $order->bank_iban = $request->input('bank_iban');
                break;
}
        $order->save();

        // Guardar productos asociados en tabla pivot
        foreach ($cart as $item) {
            $order->products()->attach($item['id'], [
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // Limpiar carrito de sesión
        Session::forget('cart');

        return redirect()->route('orders.show', $order->id);
    }

    public function userOrders()
    {
        // El metodo orders() en el modelo User ya está definido asi que ese error es incorrecto
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->get();
        return view('orders.user', compact('orders'));
    }
}
