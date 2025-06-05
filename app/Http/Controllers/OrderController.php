<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
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
        $orders = Order::all();
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
        $order->state = $request->input('state');
        $order->save();
        return redirect()->route('orders.index');
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

    public function process(OrderRequest $request)
    {
        // Obtener carrito (puede venir del session o request)
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('orders.checkout');
        }

        $data = $request->validated();

        // Crear pedido
        $order = new Order();
        $order->user_id = Auth::check() ? Auth::id() : null;
        $order->name = $data->input('name');
        $order->surname = $data->input('surname');
        $order->address = $data->input('address');
        $order->portal = $data->input('portal');
        $order->door = $data->input('door');
        $order->notes = $data->input('observations');
        $order->email = $data->input('email');
        $order->phone = $data->input('phone');
        $order->payment_method = $data->input('payment_method');
        $order->state = 'pendiente';
        $order->date = Carbon::now();

        switch ($data->input('payment_method')) {
            case 'credit_card':
                $order->card_number = $data->input('card_number');
                $order->card_name = $data->input('card_name');
                $order->card_expiration = $data->input('card_expiration');
                $order->card_cvc = $data->input('card_cvc');
                break;

            case 'paypal':
                $order->paypal_email = $data->input('paypal_email');
                break;

            case 'bank':
                $order->bank_owner = $data->input('bank_owner');
                $order->bank_iban = $data->input('bank_iban');
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
