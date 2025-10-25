<?php

namespace Database\Seeders;

use App\Models\LevelPedas;
use Illuminate\Database\Seeder;

class LevelPedasSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            ['nama_level' => 'Level 0', 'tambahan_harga' => 0],
            ['nama_level' => 'Level 1', 'tambahan_harga' => 0],
            ['nama_level' => 'Level 2', 'tambahan_harga' => 0],
            ['nama_level' => 'Level 3', 'tambahan_harga' => 1000],
            ['nama_level' => 'Level 4', 'tambahan_harga' => 2000],
            ['nama_level' => 'Level 5', 'tambahan_harga' => 3000],
        ];

        foreach ($levels as $level) {
            LevelPedas::create($level);
        }
    }
}
