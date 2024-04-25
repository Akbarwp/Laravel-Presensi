<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        $hariIni = Date::now()->format("Y-m-d");
        $user = Auth::guard('karyawan')->user();
        $presensiHariIni = DB::table("presensi")
            ->where('nik', $user->nik)
            ->where('tanggal_presensi', $hariIni)
            ->first();

        $riwayatPresensi = DB::table("presensi")
            ->where('nik', $user->nik)
            // Cara 1 mencari tanggal
            ->whereMonth('tanggal_presensi', date('m'))
            ->whereYear('tanggal_presensi', date('Y'))
            ->orderBy("tanggal_presensi", "desc")
            ->paginate(10);

        $rekapPresensi = DB::table("presensi")
            ->selectRaw("COUNT(nik) as jml_kehadiran, SUM(IF (jam_masuk > '08:00',1,0)) as jml_terlambat")
            ->where('nik', $user->nik)
            // Cara 2 mencari tanggal
            ->whereRaw("MONTH(tanggal_presensi)='" . date('m') . "'")
            ->whereRaw("YEAR(tanggal_presensi)='" . date('Y') . "'")
            ->first();

        $leaderboard = DB::table("presensi as p")
            ->join('karyawan as k', 'k.nik', '=', 'p.nik')
            ->where('tanggal_presensi', $hariIni)
            ->orderBy('jam_masuk', 'asc')
            ->paginate(10);

        return view("dashboard.index", compact("title", "presensiHariIni", "riwayatPresensi", "rekapPresensi", "leaderboard"));
    }
}
