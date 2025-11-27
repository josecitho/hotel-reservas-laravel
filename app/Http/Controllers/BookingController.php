<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Mostrar habitaciones disponibles
    public function index()
    {
        $rooms = Room::all();
        return view('hotel.index', compact('rooms'));
    }

    // Guardar una reserva
    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id'     => 'required|exists:rooms,id',
            'guest_name'  => 'required|string|max:255',
            'guest_email' => 'nullable|email',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($data['room_id']);

        $checkIn  = Carbon::parse($data['check_in'])->startOfDay();
        $checkOut = Carbon::parse($data['check_out'])->startOfDay();

        // 1) Ver si ya hay una reserva que se solape en esa habitación
        $hayChoque = Reservation::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->whereBetween('check_in', [$checkIn, $checkOut->copy()->subDay()])
                  ->orWhereBetween('check_out', [$checkIn->copy()->addDay(), $checkOut])
                  ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                      $q2->where('check_in', '<=', $checkIn)
                         ->where('check_out', '>=', $checkOut);
                  });
            })
            ->exists();

        if ($hayChoque) {
            return back()
                ->with('success', 'La habitación ya está reservada en ese rango de fechas. Elige otras fechas u otra habitación.')
                ->withInput();
        }

        // 2) Calcular noches
        $noches = $checkIn->diffInDays($checkOut);
        if ($noches < 1) {
            $noches = 1;
        }

        $totalPrice = $room->price_per_night * $noches;

        Reservation::create([
            'room_id'     => $room->id,
            'guest_name'  => $data['guest_name'],
            'guest_email' => $data['guest_email'] ?? null,
            'check_in'    => $data['check_in'],
            'check_out'   => $data['check_out'],
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        return redirect()->back()->with(
            'success',
            "Reserva creada correctamente (estado: pendiente) por {$noches} noche(s)."
        );
    }
}
