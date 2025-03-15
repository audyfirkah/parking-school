<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        // @dd($data);
        return view('index', compact('data'));
    }

    public function edit($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('users.index')->with('error', 'User tidak ditemukan.');
    }

    return view('users.edit', compact('user'));
}

    public function dd($id) {
        dd($id);
    }

}
