<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Departemen";

        $query = Departemen::orderBy('kode', 'asc');
        if ($request->cari_departemen) {
            $query->where('nama', 'like', '%'.$request->cari_departemen.'%');
            $query->orWhere('kode', 'like', '%'.$request->cari_departemen.'%');
        }
        $departemen = $query->paginate(10);

        return view('admin.departemen.index', compact('title', 'departemen'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:departemen,kode',
            'nama' => 'required|string|max:255',
        ]);

        $create = Departemen::create($data);

        if ($create) {
            return to_route('admin.departemen')->with('success', 'Data Departemen berhasil disimpan');
        } else {
            return to_route('admin.departemen')->with('error', 'Data Departemen gagal disimpan');
        }
    }

    public function edit(Request $request)
    {
        $data = Departemen::where('id', $request->id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        $departemen = Departemen::where('id', $request->id)->first();
        $data = $request->validate([
            'kode' => ['required', Rule::unique('departemen')->ignore($departemen)],
            'nama' => 'required|string|max:255',
        ]);

        $update = Departemen::where('id', $request->id)->update($data);

        if ($update) {
            return to_route('admin.departemen')->with('success', 'Data Departemen berhasil diperbarui');
        } else {
            return to_route('admin.departemen')->with('error', 'Data Departemen gagal diperbarui');
        }
    }

    public function delete(Request $request)
    {
        $delete = Departemen::where('id', $request->id)->delete();

        if ($delete) {
            return response()->json(['success' => true, 'message' => 'Data Departemen Berhasil dihapus']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data Departemen Gagal dihapus']);
        }
    }
}
