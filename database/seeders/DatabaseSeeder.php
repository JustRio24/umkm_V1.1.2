<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            LevelPedasSeeder::class,
            ProdukSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
