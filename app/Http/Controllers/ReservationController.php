<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Se obtiene el usuario logueado o null
        $user = Auth::user();

        $today = Carbon::today();
        $calendarData = [];

        for ($i = 0; $i < 30; $i++) {
            $date = $today->copy()->addDays($i);
            $calendarData[] = [
                'day' => $date->day,
                'date' => $date->toDateString(),
                'status' => $i === 0 ? 'today' : 'available',
            ];
        }

        // Se obtienen las reservas existentes para los próximos 30 días
        $reservedSlots = Reservation::whereBetween('date', [$today, $today->copy()->addDays(29)])->get(['date', 'hour']);

        return view('reservations.create', compact('calendarData', 'reservedSlots', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        // Crear la reserva
        $reservation = new Reservation();

        if (Auth::check()) {
            // Se asocia la reserva al usuario logueado
            $reservation->user_id = Auth::id();
        }

        $data = $request->validated();

        $reservation->name = $data->input('name');
        $reservation->surname = $data->input('surname');
        $reservation->phone = $data->input('phone');
        $reservation->email = $data->input('email');
        $reservation->date = Carbon::createFromFormat('d-m-Y', $data->input('date'))->format('Y-m-d');
        $reservation->hour = $data->input('hour');
        $reservation->number_people = $data->input('number_people');
        $reservation->message = $data->input('message');
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
