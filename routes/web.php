<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CatatanController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

Route::get('/area', [AreaController::class, 'index'])->name('areas.index');
Route::get('/area/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/area', [AreaController::class, 'store'])->name('areas.store');
Route::get('/area/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/area/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/area/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan.index');



// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/[id]/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/[id]', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/[id]', [UserController::class, 'destroy'])->name('users.destroy');
