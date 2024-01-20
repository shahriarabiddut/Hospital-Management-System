<?php

namespace Database\Seeders;

use App\Models\Medicine;
use App\Models\OperationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $MedicineData = [
            [
                'name' => 'Napa',
                'generic' => 'Paracetamol',
                'type' => 'Pain Killer',
                'strength' => '500 mg',
                'price' => '1.3',
            ], [
                'name' => 'Ace',
                'generic' => 'Paracetamol',
                'type' => 'Pain Killer',
                'strength' => '500 mg',
                'price' => '1.3',
            ],
        ];
        Medicine::insert($MedicineData);
    }
}
