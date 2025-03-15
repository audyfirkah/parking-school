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
}
