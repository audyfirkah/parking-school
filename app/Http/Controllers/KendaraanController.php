<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\User;

class KendaraanController extends Controller
{
    // Menampilkan daftar kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::with('user')->paginate(10);
        return view('pages.admin.kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan form tambah kendaraan
    public function create()
    {
        $users = User::all();
        return view('pages.admin.kendaraan.create', compact('users'));
    }

    // Menyimpan data kendaraan baru
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'id_user'    => 'required|exists:users,id_user',
            'plat_nomor' => 'required|string|max:20|unique:kendaraans,plat_nomor',
            'tipe'       => 'required|in:motor,mobil',
            'no_stnk'    => 'required|string|max:255|unique:kendaraans,no_stnk',
        ]);

        Kendaraan::create([
            'id_user'    => $request->id_user,
            'plat_nomor' => $request->plat_nomor,
            'tipe'       => $request->tipe,
            'no_stnk'    => $request->no_stnk,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Menampilkan form edit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $users = User::all();
        return view('pages.admin.kendaraan.edit', compact('kendaraan', 'users'));
    }

    // Menyimpan perubahan data kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'id_user'    => 'required|exists:users,id_user',
            'plat_nomor' => 'required|string|max:20|unique:kendaraans,plat_nomor,' . $id . ',id_kendaraan',
            'tipe'       => 'required|in:motor,mobil',
            'no_stnk'    => 'required|string|max:255|unique:kendaraans,no_stnk,' . $id . ',id_kendaraan',
        ]);

        $kendaraan->update([
            'id_user'    => $request->id_user,
            'plat_nomor' => $request->plat_nomor,
            'tipe'       => $request->tipe,
            'no_stnk'    => $request->no_stnk,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    // Menghapus kendaraan
    public function destroy($id)
    {
        Kendaraan::findOrFail($id)->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
