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
        $staff = [[
            'department_id' => '1',
            'name' => 'Staff 1',
            'email' => 'staff1@gmail.com',
            'password' => bcrypt('Password')
        ],
        [
            'department_id' => '2',
            'name' => 'Staff 2',
            'email' => 'staff2@gmail.com',
            'password' => bcrypt('Password')
        ],[
            'department_id' => '3',
            'name' => 'Staff 3',
            'email' => 'staff3@gmail.com',
            'password' => bcrypt('Password')
        ],[
            'department_id' => '4',
            'name' => 'Staff 4',
            'email' => 'staff4@gmail.com',
            'password' => bcrypt('Password')
        ],[
            'department_id' => '5',
            'name' => 'Staff 5',
            'email' => 'staff5@gmail.com',
            'password' => bcrypt('Password')
        ],
    
    ];
        Staff::insert($staff);
    }
}
