<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::create([
            'kode' => 'D001',
            'nama' => 'Technology & Infomation',
        ]);
        Departemen::create([
            'kode' => 'D002',
            'nama' => 'Marketing',
        ]);
        Departemen::create([
            'kode' => 'D003',
            'nama' => 'Human Resource',
        ]);
    }
}
