<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AdminSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SiteOptionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(DegreeSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(DoctorDegreeSeeder::class);
        $this->call(DoctorSpecialitySeeder::class);
        $this->call(MedicineSeeder::class);
    }
}
