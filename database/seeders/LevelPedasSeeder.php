<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelPedasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('level_pedas')->insert([
            ['id_level' => 1, 'nama_level' => 'Level 0', 'tambahan_harga' => 0],
            ['id_level' => 2, 'nama_level' => 'Level 1', 'tambahan_harga' => 0],
            ['id_level' => 3, 'nama_level' => 'Level 2', 'tambahan_harga' => 0],
            ['id_level' => 4, 'nama_level' => 'Level 3', 'tambahan_harga' => 1000],
            ['id_level' => 5, 'nama_level' => 'Level 4', 'tambahan_harga' => 2000],
            ['id_level' => 6, 'nama_level' => 'Level 5', 'tambahan_harga' => 3000],
        ]);
    }
}
