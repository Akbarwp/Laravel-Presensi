<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = "Profile";
        $karyawan = Karyawan::where('nik', auth()->guard('karyawan')->user()->nik)->first();
        return view('dashboard.profile.index', compact('title', 'karyawan'));
    }

    public function update(Request $request)
    {
        $karyawan = Karyawan::where('nik', auth()->guard('karyawan')->user()->nik)->first();

        if ($request->hasFile('foto')) {
            $foto = $karyawan->nik . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $karyawan->foto;
        }

        if ($request->password != null) {
            $update = Karyawan::where('nik', auth()->guard('karyawan')->user()->nik)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'password' => Hash::make($request->password),
                'foto' => $foto,
                'updated_at' => Carbon::now(),
            ]);

        } elseif ($request->password == null) {
            $update = Karyawan::where('nik', auth()->guard('karyawan')->user()->nik)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'foto' => $foto,
                'updated_at' => Carbon::now(),
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

    public function indexAdmin(Request $request)
    {
        $title = "Data Karyawan";

        $departemen = Departemen::get();

        $query = Karyawan::join('departemen as d', 'karyawan.departemen_id', '=', 'd.id')->select('karyawan.*', 'd.kode')->orderBy('d.kode', 'asc')->orderBy('karyawan.nama_lengkap', 'asc');
        if ($request->nama_karyawan) {
            $query->where('karyawan.nama_lengkap', 'like', '%'.$request->nama_karyawan.'%');
        }
        if ($request->kode_departemen) {
            $query->where('d.kode', 'like', '%'.$request->kode_departemen.'%');
        }
        $karyawan = $query->paginate(10);

        return view('admin.karyawan.index', compact('title', 'karyawan', 'departemen'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|unique:karyawan,nik',
            'departemen_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:karyawan,email',
            'password' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('foto')) {
            $foto = $request->nik . "." . $request->file('foto')->getClientOriginalExtension();
        }

        $create = Karyawan::create($data);

        if ($create) {
            if ($request->hasFile('foto')) {
                $folderPath = "public/unggah/karyawan/";
                $request->file('foto')->storeAs($folderPath, $foto);
            }
            return to_route('admin.karyawan')->with('success', 'Data Karyawan berhasil disimpan');
        } else {
            return to_route('admin.karyawan')->with('error', 'Data Karyawan gagal disimpan');
        }
    }

    public function edit(Request $request)
    {
        $data = Karyawan::where('nik', $request->nik)->first();
        return $data;
    }

    public function updateAdmin(Request $request)
    {
        $karyawan = Karyawan::where('nik', $request->nik_lama)->first();
        $data = $request->validate([
            'nik' => ['required', Rule::unique('karyawan')->ignore($karyawan)],
            'departemen_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => ['required', 'email', Rule::unique('karyawan')->ignore($karyawan)],
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->nik . "." . $request->file('foto')->getClientOriginalExtension();
        }

        $update = Karyawan::where('nik', $request->nik_lama)->update($data);

        if ($update) {
            if ($request->hasFile('foto')) {
                $folderPath = "public/unggah/karyawan/";
                $request->file('foto')->storeAs($folderPath, $data['foto']);
            }
            return to_route('admin.karyawan')->with('success', 'Data Karyawan berhasil diperbarui');
        } else {
            return to_route('admin.karyawan')->with('error', 'Data Karyawan gagal diperbarui');
        }
    }

    public function delete(Request $request)
    {
        $data = Karyawan::where('nik', $request->nik)->first();
        $delete = Karyawan::where('nik', $request->nik)->delete();
        if ($delete && $data->foto) {
            $folderPath = "public/unggah/karyawan/";
            Storage::delete($folderPath . $data->foto);
        }

        if ($delete) {
            return response()->json(['success' => true, 'message' => 'Data Karyawan Berhasil dihapus']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data Karyawan Gagal dihapus']);
        }
    }
}
