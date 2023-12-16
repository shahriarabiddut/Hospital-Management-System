<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departments = [
            [
                'title' => 'Cardiology',
                'detail' => 'Cardiology Department',
            ] ,[
                'title' => 'Dermatology and Cosmetology',
                'detail' => 'Dermatology and Cosmetology Department',
            ] ,[
                'title' => 'General Surgery',
                'detail' => 'General Surgery Department',
            ] ,[
                'title' => 'Health Checkup Packages',
                'detail' => 'Health Checkup Packages Department',
            ] ,[
                'title' => 'Neurology',
                'detail' => 'Neurology Department',
            ] ,
        ];
        Department::insert($departments);
    }
}
