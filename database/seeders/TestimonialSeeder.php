<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            ['id' => 1, 'nama' => 'Budi Santoso', 'pesan' => 'Mie Mercon Jawara benar-benar pedas dan lezat!', 'rating' => 5],
            ['id' => 2, 'nama' => 'Siti Nurhaliza', 'pesan' => 'Chicken Katsu Mercon-nya enak banget!', 'rating' => 5],
            ['id' => 3, 'nama' => 'Ahmad Wijaya', 'pesan' => 'Dimsum Mentai-nya creamy, cocok untuk cemilan.', 'rating' => 4],
            ['id' => 4, 'nama' => 'Rina Kusuma', 'pesan' => 'Pelayanannya cepat dan ramah.', 'rating' => 5],
            ['id' => 5, 'nama' => 'Doni Hermawan', 'pesan' => 'Wonton-nya empuk dan kuahnya gurih.', 'rating' => 5],
        ]);
    }
}
