<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'nik' => '12345',
            'departemen_id' => '1',
            'nama_lengkap' => 'Ucup',
            'foto' => '12345.jpg',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456789',
            'email' => 'ucup@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Karyawan::create([
            'nik' => '12346',
            'departemen_id' => '2',
            'nama_lengkap' => 'Wati',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456780',
            'email' => 'wati@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Karyawan::create([
            'nik' => '12347',
            'departemen_id' => '3',
            'nama_lengkap' => 'Mawar',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456781',
            'email' => 'mawar@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
