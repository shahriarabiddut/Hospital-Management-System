<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $test = [
            [
                'name' => 'Blood Test',
                'test1' => 'Hemoglobin',
                'normalrange1' => '120-160',
                'test2' => 'Leukocte',
                'normalrange2' => '4800-10000',
                'test3' => 'urea',
                'normalrange3' => '7-35',
                'test4' => 'Glucose',
                'normalrange4' => '4-7',
                'test5' => 'Creatinine',
                'normalrange5' => '45-98',
                'test6' => '',
                'normalrange6' => '',
                'test7' => '',
                'normalrange7' => '',
                'test8' => '',
                'normalrange8' => '',
                'test9' => '',
                'normalrange9' => '',
                'test10' => '',
                'normalrange10' => '',
                'price' => '1000',
            ],
            [
                'name' => 'Urine Test',
                'test1' => 'Epinephrine',
                'normalrange1' => '0-20',
                'test2' => 'metanephrine',
                'normalrange2' => '0-1000',
                'test3' => 'norepinephrine',
                'normalrange3' => '15-80',
                'test4' => 'normetanephrine',
                'normalrange4' => '100-500',
                'test5' => 'Dopamine',
                'normalrange5' => '65-400',
                'test6' => '',
                'normalrange6' => '',
                'test7' => '',
                'normalrange7' => '',
                'test8' => '',
                'normalrange8' => '',
                'test9' => '',
                'normalrange9' => '',
                'test10' => '',
                'normalrange10' => '',
                'price' => '1000',
            ],
            [
                'name' => 'Thyroid Function Tests',
                'test1' => 'S Free T4(mU/l)',
                'normalrange1' => '19.4',
                'test2' => 'S Free T4(mU/l)',
                'normalrange2' => '4.9',
                'test3' => 'S TSH',
                'normalrange3' => '1.3',
                'test4' => '',
                'normalrange4' => '',
                'test5' => '',
                'normalrange5' => '',
                'test6' => '',
                'normalrange6' => '',
                'test7' => '',
                'normalrange7' => '',
                'test8' => '',
                'normalrange8' => '',
                'test9' => '',
                'normalrange9' => '',
                'test10' => '',
                'normalrange10' => '',
                'price' => '1000',
            ],
            [
                'name' => 'CBC test',
                'test1' => 'WBC(/μL)',
                'normalrange1' => '4-11x10^3',
                'test2' => 'RBC(/μL)',
                'normalrange2' => '4-11x10^6',
                'test3' => 'Hgb(/dl)',
                'normalrange3' => '12-16',
                'test4' => 'Hct(%)',
                'normalrange4' => '40-49',
                'test5' => 'MCV(fl)',
                'normalrange5' => '80-100',
                'test6' => 'PLT(/μL)',
                'normalrange6' => '4-11x10^3',
                'test7' => '',
                'normalrange7' => '',
                'test8' => '',
                'normalrange8' => '',
                'test9' => '',
                'normalrange9' => '',
                'test10' => '',
                'normalrange10' => '',
                'price' => '1000',
            ],
            [
                'name' => 'Lipid Panel Test',
                'test1' => 'Total cholestrol(mg/dL)',
                'normalrange1' => '100-200',
                'test2' => 'HDL(mg/dL)',
                'normalrange2' => '40-60',
                'test3' => 'LDL(mg/dL)',
                'normalrange3' => '70-130',
                'test4' => 'Triglycerides(mg/dL)',
                'normalrange4' => '10-150',
                'test5' => '',
                'normalrange5' => '',
                'test6' => '',
                'normalrange6' => '',
                'test7' => '',
                'normalrange7' => '',
                'test8' => '',
                'normalrange8' => '',
                'test9' => '',
                'normalrange9' => '',
                'test10' => '',
                'normalrange10' => '',
                'price' => '1000',
            ],


        ];
        Test::insert($test);
    }
}
