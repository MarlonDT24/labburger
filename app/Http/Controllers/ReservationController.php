<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        return view('reservations.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->user_id = $request->input('user_id');
        $reservation->date = $request->input('date');
        $reservation->hour = $request->input('hour');
        $reservation->number_people = $request->input('number_people');
        $reservation->save();

        return redirect()->route('reservations.show', $reservation->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->user_id = $request->input('user_id');
        $reservation->date = $request->input('date');
        $reservation->hour = $request->input('hour');
        $reservation->number_people = $request->input('number_people');
        $reservation->save();

        return redirect()->route('reservations.show', $reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
