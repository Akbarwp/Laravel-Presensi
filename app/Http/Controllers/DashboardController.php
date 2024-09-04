<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        $hariIni = Carbon::now()->format("Y-m-d");
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

        $rekapPengajuanPresensi = DB::table("pengajuan_presensi")
            ->selectRaw("SUM(IF (status = 'I',1,0)) as jml_izin, SUM(IF (status = 'S',1,0)) as jml_sakit")
            ->where('nik', $user->nik)
            ->where('status_approved', 1)
            ->whereRaw("MONTH(tanggal_pengajuan)='" . date('m') . "'")
            ->whereRaw("YEAR(tanggal_pengajuan)='" . date('Y') . "'")
            ->first();

        $leaderboard = DB::table("presensi as p")
            ->join('karyawan as k', 'k.nik', '=', 'p.nik')
            ->where('tanggal_presensi', $hariIni)
            ->orderBy('jam_masuk', 'asc')
            ->paginate(10);

        return view("dashboard.index", compact("title", "presensiHariIni", "riwayatPresensi", "rekapPresensi", "rekapPengajuanPresensi", "leaderboard"));
    }

    public function indexAdmin()
    {
        $title = "Dashboard Admin";

        $hariIni = Carbon::now()->format("Y-m-d");

        $totalKaryawan = Karyawan::count();

        $rekapPresensi = DB::table("presensi")
            ->selectRaw("COUNT(nik) as jml_kehadiran, SUM(IF (jam_masuk > '08:00',1,0)) as jml_terlambat")
            ->where('tanggal_presensi', $hariIni)
            ->first();

        $rekapPengajuanPresensi = DB::table("pengajuan_presensi")
            ->selectRaw("SUM(IF (status = 'I',1,0)) as jml_izin, SUM(IF (status = 'S',1,0)) as jml_sakit")
            ->where('status_approved', 1)
            ->where('tanggal_pengajuan', $hariIni)
            ->first();

        return view("admin.dashboard", compact("title", "totalKaryawan", "rekapPresensi", "rekapPengajuanPresensi"));
    }
}
