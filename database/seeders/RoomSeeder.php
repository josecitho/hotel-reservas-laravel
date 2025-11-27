<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['number' => '101', 'type' => 'Single', 'capacity' => 1, 'price_per_night' => 45000, 'status' => 'available'],
            ['number' => '102', 'type' => 'Single', 'capacity' => 1, 'price_per_night' => 45000, 'status' => 'available'],
            ['number' => '103', 'type' => 'Double', 'capacity' => 2, 'price_per_night' => 60000, 'status' => 'available'],
            ['number' => '104', 'type' => 'Double', 'capacity' => 2, 'price_per_night' => 60000, 'status' => 'available'],
            ['number' => '105', 'type' => 'Suite',  'capacity' => 3, 'price_per_night' => 90000, 'status' => 'available'],
            ['number' => '201', 'type' => 'Single', 'capacity' => 1, 'price_per_night' => 47000, 'status' => 'available'],
            ['number' => '202', 'type' => 'Double', 'capacity' => 2, 'price_per_night' => 62000, 'status' => 'available'],
            ['number' => '203', 'type' => 'Double', 'capacity' => 2, 'price_per_night' => 62000, 'status' => 'available'],
            ['number' => '204', 'type' => 'Suite',  'capacity' => 3, 'price_per_night' => 95000, 'status' => 'available'],
            ['number' => '205', 'type' => 'Suite',  'capacity' => 4, 'price_per_night' => 110000, 'status' => 'available'],
        ]);
    }
}
