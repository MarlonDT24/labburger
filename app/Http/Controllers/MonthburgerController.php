<?php

namespace App\Http\Controllers;

use App\Models\Monthburger;
use Illuminate\Http\Request;

class MonthburgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monthburger = Monthburger::all();
        return view('monthburgers.index', compact('monthburger'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monthburgers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $monthburger = new Monthburger();
        $monthburger->product_id = $request->input('product_id');
        $monthburger->date = $request->input('date');
        $monthburger->ingredients = $request->input('ingredients');
        $monthburger->save();

        return redirect()->route('monthburgers.show', $monthburger->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Monthburger $monthburger)
    {
        return view('monthburgers.show', compact('monthburger'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monthburger $monthburger)
    {
        return view('monthburgers.edit', compact('monthburger'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monthburger $monthburger)
    {
        $monthburger->product_id = $request->input('product_id');
        $monthburger->date = $request->input('date');
        $monthburger->ingredients = $request->input('ingredients');
        $monthburger->save();

        return redirect()->route('monthburgers.show', $monthburger->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monthburger $monthburger)
    {
        $monthburger->delete();
        return redirect()->route('monthburgers.index');
    }
}
