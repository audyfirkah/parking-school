<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = Catatan::with(['user', 'area', 'kendaraan'])->paginate(10);
        return view('pages.admin.catatan.index', compact('catatans'));
    }

    public function create() {
        return view('pages.admin.catatan.scan');
    }
    public function scan(Request $request) {
        $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_area' => 'required|exists:areas,id_area',
            'id_kendaraan' => 'required|exists:kendaraans,id_kendaraan',
            'jam_masuk' => 'required|date_format:H:i:s',
            'jam_keluar' => 'required|date_format:H:i:s',
        ]);

            dd($request->all());

        Catatan::create([
            'id_user' => $request->id_user,
            'id_area' => $request->id_area,
            'id_kendaraan' => $request->id_kendaraan,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
        ]);
    }
}
