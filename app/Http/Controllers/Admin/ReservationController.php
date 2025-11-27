<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Mostrar la lista de todas las reservas
    public function index()
    {
        $reservations = Reservation::with('room')
            ->orderByDesc('id')
            ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    // Actualizar el estado de una reserva
    public function updateStatus(Request $request, Reservation $reservation)
    {
        // Validamos el estado
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        // Actualizamos el estado de la reserva
        $reservation->status = $request->status;
        $reservation->save();

        return back()->with('success', 'Estado de la reserva actualizado correctamente.');
    }
}



