<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['siswa', 'guru', 'admin'];
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'nama' => 'User ' . $i,
                'kode' => Str::random(10),
                'id_jurusan' => rand(1, 3),
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role' => $roles[array_rand($roles)],
                'no_telp' => '08' . rand(1000000000, 9999999999),
                'no_ktp' => rand(1000000000000000, 9999999999999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
