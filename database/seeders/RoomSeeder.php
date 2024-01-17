<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Room = [
            [
                'title' => '101',
                'floor' => '1st Floor',
                'location' => '1st Building',
                'vacancy' => '50',
                'room_type_id' => '1',
            ], [
                'title' => '201',
                'floor' => '2nd Floor',
                'location' => '1st Building',
                'vacancy' => '2',
                'room_type_id' => '2',
            ],
        ];
        Room::insert($Room);
    }
}
