<?php

namespace Database\Seeders;

use App\Models\OperationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $OperationTypeData = [
            [
                'title' => 'Appendix Surgery',
                'detail' => 'Appendix Surgery',
                'price' => '5000',
            ], [
                'title' => 'Toncil Surgery',
                'detail' => 'Toncil Surgery',
                'price' => '7000',
            ],
        ];
        OperationType::insert($OperationTypeData);
    }
}
