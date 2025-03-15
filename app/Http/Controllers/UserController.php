<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        // @dd($data);
        return view('pages.admin.user.index', compact('data'));
    }

    


    public function create() {
         $jurusans = Jurusan::all();

        return view('pages.admin.user.addUsers', compact('jurusans'));
    }

    
public function store(Request $request) {
    // $jurusans = Jurusan::all();
// dd($request->input('id_jurusan'));

    // dd($request->all());

    $request->validate([
        'nama' => 'required|string|max:255',
        'kode' => 'required|string|max:50|unique:users,kode',
        'id_jurusan' => 'required|exists:jurusans,id_jurusan',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|in:admin,user',
        'no_telp' => 'required|string|max:15',
        'no_ktp' => 'required|string|max:20|unique:users,no_ktp',
    ]);

    $user = User::create([
        'nama' => $request->nama,
        'kode' => $request->kode,
        'id_jurusan' => $request->id_jurusan,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'no_telp' => $request->no_telp,
        'no_ktp' => $request->no_ktp,
    ]);

    // dd(1);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
}


    public function edit($id)
    {
        $data = User::findOrFail($id); // Gunakan findOrFail agar error 404 jika user tidak ditemukan
        $jurusans = Jurusan::all(); // Ambil semua data jurusan untuk dropdown
        
        return view('pages.admin.user.editUsers', compact('data', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100',
            'id_jurusan' => 'required|exists:jurusans,id_jurusan', // Pastikan jurusan ada di DB
            'email' => 'required|email|unique:users,email,' . $id . ',id_user', 
            'password' => 'nullable|min:8', // Password tidak wajib diisi
            'role' => 'required|in:admin,user',
            'no_telp' => 'required|numeric',
            'no_ktp' => 'required|numeric',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->nama = $validated['nama'];
        $user->kode = $validated['kode'];
        $user->id_jurusan = $validated['id_jurusan'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->no_telp = $validated['no_telp'];
        $user->no_ktp = $validated['no_ktp'];

        // Jika ada password baru, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

}
