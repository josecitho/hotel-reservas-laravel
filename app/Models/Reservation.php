<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
    'room_id',
    'guest_name',
    'guest_email',
    'check_in',
    'check_out',
    'total_price',
    'status',
];
public function room()
{
    return $this->belongsTo(\App\Models\Room::class);
}



}
