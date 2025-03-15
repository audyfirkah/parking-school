<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    // Menampilkan daftar area
    public function index()
    {
        $areas = Area::paginate(10);
        return view('pages.admin.areas.index', compact('areas'));
    }

    // Menampilkan form tambah area
    public function create()
    {
        return view('pages.admin.areas.create');
    }

    // Menyimpan data area baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50|unique:areas,nama',
            'kapasitas' => 'required|integer|min:1'
        ]);

        Area::create([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect()->route('areas.index')->with('success', 'Area berhasil ditambahkan.');
    }

    // Menampilkan form edit area
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('pages.admin.areas.edit', compact('area'));
    }

    // Menyimpan perubahan data area
    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:50|unique:areas,nama,' . $id,
            'kapasitas' => 'required|integer|min:1'
        ]);

        $area->update([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect()->route('areas.index')->with('success', 'Area berhasil diperbarui.');
    }

    // Menghapus area
    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        return redirect()->route('areas.index')->with('success', 'Area berhasil dihapus.');
    }
}
