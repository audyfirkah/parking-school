<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CatatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('catatans')->insert([
                'id_user' => rand(1, 10),
                'id_area' => rand(1, 3),
                'id_kendaraan' => rand(1, 10),
                'kode' => Str::random(10),
                'jam_masuk' => Carbon::now()->subHours(rand(1, 5))->format('H:i:s'),
                'jam_keluar' => Carbon::now()->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
