<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['id_kategori' => 1, 'nama_kategori' => 'Makanan'],
            ['id_kategori' => 2, 'nama_kategori' => 'Minuman'],
            ['id_kategori' => 3, 'nama_kategori' => 'Topping'],
        ]);
    }
}
