<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'name' => 'patient1',
                'email' => 'patient1@gmail.com',
                'password' => bcrypt('Password'),
                'mobile' => '01918380751',
                'dob'=> '2023-05-02',
                'address' => 'Kushtia',
                'guardian' => 'abc'
            ],
            [
                'name' => 'patient2',
                'email' => 'patient2@gmail.com',
                'password' => bcrypt('Password'),
                'mobile' => '01918380751',
                'dob'=> '1978-03-03',
                'address' => 'kumarkhali, Kushtia',
                'guardian' => 'abc'
            ],
            [
                'name' => 'patient3',
                'email' => 'patient3@gmail.com',
                'password' => bcrypt('Password'),
                'mobile' => '01918380751',
                'dob'=> '1978-03-05',
                'address' => 'kumarkhali, Kushtia',
                'guardian' => 'abcd'
            ],
            [
                'name' => 'patient4',
                'email' => 'patient4@gmail.com',
                'password' => bcrypt('Password'),
                'mobile' => '01918380750',
                'dob'=> '1978-03-03',
                'address' => 'kumarkhali, Kushtia',
                'guardian' => 'abcde'
            ],
            [
                'name' => 'patient5',
                'email' => 'patient5@gmail.com',
                'password' => bcrypt('Password'),
                'mobile' => '01918380759',
                'dob'=> '1978-03-03',
                'address' => 'kumarkhali, Kushtia',
                'guardian' => 'abcde'
            ],

        ];
        User::insert($user);
    }
}
