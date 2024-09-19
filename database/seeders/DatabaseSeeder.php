<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'achmad',
            'email' => 'achmad@gmail.com',
            'password' => Hash::make('123456'),
            'roles' => 'admin',
            'position' => 'Staff',
            'department' => 'IT',


        ]);

        \App\Models\Company::create([
            'name' => 'Yayasan CARE Peduli',
            'email' => 'care_it@careind.or.id',
            'address' => 'Jln. Taman MargaSatwa blok D no26 Pasar Minggu Jakarta Selatan',
            'latitude' => '-6.290532930135223',
            'longitude' => '106.82286366494873',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out' => '16:30'
        ]);

        $this->call(
            [
                AttendanceSeeder::class,
                PermissionSeeder::class,
            ]
        );
    }
}
