<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            ['nama' => 'Area A', 'kapasitas' => 50, 'created_at' => now()],
            ['nama' => 'Area B', 'kapasitas' => 30, 'created_at' => now()],
            ['nama' => 'Area C', 'kapasitas' => 40, 'created_at' => now()],
        ]);
    }
}
