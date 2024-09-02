<?php

namespace Database\Seeders;

use App\Enums\StatusPengajuanPresensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PengajuanPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('pengajuan_presensi')->insert([
                "nik" => "12345",
                "tanggal_pengajuan" => date_create("2024-".Date::now()->format('m')."-" . $i)->format("Y-m-d"),
                "status" => fake()->randomElement([StatusPengajuanPresensi::IZIN, StatusPengajuanPresensi::SAKIT]),
                "keterangan" => fake()->sentence(),
                "status_approved" => fake()->randomElement(['0','1','2']),
                "created_at" => Date::now(),
                "updated_at" => Date::now(),
            ]);
        }
    }
}
