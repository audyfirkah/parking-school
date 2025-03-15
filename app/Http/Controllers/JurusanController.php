<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    // Menampilkan daftar jurusan
    public function index()
    {
        $jurusans = Jurusan::paginate(10);
        return view('pages.admin.jurusan.index', compact('jurusans'));
    }

    // Menampilkan form tambah jurusan
    public function create()
    {
        return view('pages.admin.jurusan.create');
    }

    // Menyimpan data jurusan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jurusans,nama'
        ]);

        Jurusan::create([ 'nama' => $request->nama ]);

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    // Menampilkan form edit jurusan
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('pages.admin.jurusan.edit', compact('jurusan'));
    }

    // Menyimpan perubahan data jurusan
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255|unique:jurusans,nama,' . $id
        ]);

        $jurusan->update([ 'nama' => $request->nama ]);

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    // Menghapus jurusan
    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
