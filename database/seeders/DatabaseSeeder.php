<?php

namespace Database\Seeders;

use App\Models\Karyawan;
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
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        Karyawan::create([
            'nik' => '12345',
            'nama_lengkap' => 'Ucup',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456789',
            'email' => 'ucup@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
