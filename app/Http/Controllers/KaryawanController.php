<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = "Profile";
        $karyawan = DB::table('karyawan')->where('nik', auth()->guard('karyawan')->user()->nik)->first();
        return view('dashboard.profile.index', compact('title', 'karyawan'));
    }

    public function update(Request $request)
    {
        $karyawan = DB::table('karyawan')->where('nik', auth()->guard('karyawan')->user()->nik)->first();

        if ($request->hasFile('foto')) {
            $foto = $karyawan->nik . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $karyawan->foto;
        }

        if ($request->password != null) {
            $update = DB::table('karyawan')->where('nik', auth()->guard('karyawan')->user()->nik)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'password' => Hash::make($request->password),
                'foto' => $foto,
                'updated_at' => Date::now(),
            ]);

        } elseif ($request->password == null) {
            $update = DB::table('karyawan')->where('nik', auth()->guard('karyawan')->user()->nik)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'foto' => $foto,
                'updated_at' => Date::now(),
            ]);
        }

        if ($update) {
            if ($request->hasFile('foto')) {
                $folderPath = "public/unggah/karyawan/";
                $request->file('foto')->storeAs($folderPath, $foto);
            }
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Profile updated failed');
        }
    }
}
