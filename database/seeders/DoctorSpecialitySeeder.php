<?php

namespace Database\Seeders;

use App\Models\DoctorSpeciality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $DoctorData = [
            [
                'doctor_id' => '2',
                'speciality_id' => '1',
            ], [
                'doctor_id' => '4',
                'speciality_id' => '1',
            ],
        ];
        DoctorSpeciality::insert($DoctorData);
    }
}
