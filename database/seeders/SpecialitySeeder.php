<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Speciality = [
            [
                'name' => 'Surgeon',
            ], [
                'name' => 'Eye , Ear and Nose',
            ],
        ];
        Speciality::insert($Speciality);
    }
}
