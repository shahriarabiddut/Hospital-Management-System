<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $staff = [
            [
                'department_id' => '1',
                'name' => 'Staff 1',
                'email' => 'staff1@gmail.com',
                'password' => bcrypt('Password'),
                'type' => 'nurse',
                'mobile' => '01945506778',
                'address' => 'address',
                'fee' => '0'
            ],
            [
                'department_id' => '2',
                'name' => 'Doctor',
                'email' => 'staff2@gmail.com',
                'password' => bcrypt('Password'),
                'type' => 'doctor',
                'mobile' => '01945506778',
                'address' => 'address',
                'fee' => '500'
            ], [
                'department_id' => '3',
                'name' => 'Technician',
                'email' => 'staff3@gmail.com',
                'password' => bcrypt('Password'),
                'type' => 'technician',
                'mobile' => '01945506778',
                'address' => 'address',
                'fee' => '0'
            ], [
                'department_id' => '4',
                'name' => 'Staff 4',
                'email' => 'staff4@gmail.com',
                'password' => bcrypt('Password'),
                'type' => 'doctor',
                'mobile' => '01945506778',
                'address' => 'address',
                'fee' => '1000'
            ], [
                'department_id' => '5',
                'name' => 'Staff 5',
                'email' => 'staff5@gmail.com',
                'password' => bcrypt('Password'),
                'type' => 'staff',
                'mobile' => '01945506778',
                'address' => 'address',
                'fee' => '0'
            ],

        ];
        Staff::insert($staff);
    }
}
