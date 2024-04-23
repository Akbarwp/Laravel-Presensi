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
            'nama_lengkap' => 'Ucup',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456789',
            'email' => 'ucup@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        Karyawan::create([
            'nik' => '12346',
            'nama_lengkap' => 'Wati',
            'jabatan' => 'Karyawan',
            'telepon' => '08123456780',
            'email' => 'wati@gmail.com',
            'password' => Hash::make('12346'),
        ]);
    }
}
