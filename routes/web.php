<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use Illuminate\Support\Facades\Route;

// Página pública del hotel (cliente)
Route::get('/', [BookingController::class, 'index'])->name('hotel.index');
Route::post('/reservar', [BookingController::class, 'store'])->name('hotel.reserve');

// (Opcional) si quieres seguir viendo la vista de bienvenida de Laravel:
Route::get('/welcome', function () {
    return view('welcome');
});

// Dashboard de Breeze (para usuarios logueados)
Route::get('/dashboard', function () {
    return redirect()->route('admin.reservas.index');
})->middleware(['auth', 'verified'])->name('dashboard');



// Rutas protegidas para perfil (Breeze)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reservas', [AdminReservationController::class, 'index'])
        ->name('reservas.index');

    Route::post('/reservas/{reservation}/estado', [AdminReservationController::class, 'updateStatus'])
        ->name('reservas.updateStatus');
});


// Rutas del panel admin (solo usuario logueado)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reservas', [AdminReservationController::class, 'index'])
        ->name('reservas.index');

    Route::post('/reservas/{reservation}/estado', [AdminReservationController::class, 'updateStatus'])
        ->name('reservas.updateStatus');
});

// Rutas de autenticación generadas por Breeze
require __DIR__.'/auth.php';
