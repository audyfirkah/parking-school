<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('kendaraans')->insert([
                'id_user' => rand(1, 10),
                'plat_nomor' => 'D ' . rand(1000, 9999) . ' XYZ',
                'tipe' => rand(0, 1) ? 'motor' : 'mobil',
                'no_stnk' => Str::random(15),
                'created_at' => now(),
            ]);
        }
    }
}
