<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Degree = [
            [
                'name' => 'MBBS',
            ], [
                'name' => 'FRCS',
            ],
        ];
        Degree::insert($Degree);
    }
}
