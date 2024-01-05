<?php

namespace Database\Seeders;

use App\Models\DoctorDegree;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $DoctorDegreeData = [
            [
                'doctor_id' => '2',
                'degree_id' => '1',
            ], [
                'doctor_id' => '4',
                'degree_id' => '1',
            ],
        ];
        DoctorDegree::insert($DoctorDegreeData);
    }
}
