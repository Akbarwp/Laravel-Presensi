<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\LokasiKantor;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        LokasiKantor::create([
            'kota' => 'Tenetur Nostrum',
            'alamat' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, vero.',
            'latitude' => -7.313151173243561,
            'longitude' => 112.72715491471567,
            'radius' => 33,
            'is_used' => true,
        ]);

        $this->call([
            DepartemenSeeder::class,
            KaryawanSeeder::class,
            PresensiSeeder::class,
            PengajuanPresensiSeeder::class,
        ]);
    }
}
