<?php

namespace Database\Seeders;

use App\Models\SiteOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = [
            [
                'name' => 'title',
                'value' => 'Hospital Management System'
            ],
            [
                'name' => 'logo',
                'value' => 'assets/img/logo/unity_white.jpg'
            ],
            [
                'name' => 'systemname',
                'value' => 'Hospital Appointment System'
            ],[
                'name' => 'contactemail',
                'value' => 'contactemail@gmail.com'
            ],
            [
                'name' => 'contactphone',
                'value' => '01945506778'
            ],
            [
                'name' => 'address',
                'value' => 'Dhaka,Bangladesh'
            ],
        ];
        SiteOption::insert($options);
    }
}
