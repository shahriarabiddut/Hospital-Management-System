<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $RoomType = [
            [
                'title' => '50 Bed',
                'details' => '50 Beds',
                'seat' => '50',
                'price' => '300',
            ], [
                'title' => 'Twin Shared',
                'details' => '2 Beds',
                'seat' => '2',
                'price' => '5000',
            ],
        ];
        RoomType::insert($RoomType);
    }
}
