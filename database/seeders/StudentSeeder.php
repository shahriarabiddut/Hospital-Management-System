<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student = [
            'name' => 'Samiul Bashar',
            'email' => 'samiulbashar@gmail.com',
            'password' => bcrypt('Password')
        ];
        Student::insert($student);
    }
}
