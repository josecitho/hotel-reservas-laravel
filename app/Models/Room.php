<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    'number',
    'type',
    'capacity',
    'price_per_night',
    'status',
];
public function reservations()
{
    return $this->hasMany(\App\Models\Reservation::class);
}



}
