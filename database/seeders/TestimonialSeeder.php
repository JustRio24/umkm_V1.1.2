<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['nama' => 'Budi Santoso', 'pesan' => 'Mie Mercon Jawara benar-benar pedas dan lezat! Saya suka banget dengan level 5 nya. Recommended!', 'rating' => 5],
            ['nama' => 'Siti Nurhaliza', 'pesan' => 'Chicken Katsu Mercon-nya enak banget, porsinya besar dan harganya terjangkau. Bakal jadi langganan nih.', 'rating' => 5],
            ['nama' => 'Ahmad Wijaya', 'pesan' => 'Dimsum Mentai-nya unik dan enak, topping mentai-nya creamy. Cocok buat cemilan.', 'rating' => 4],
            ['nama' => 'Rina Kusuma', 'pesan' => 'Pelayanannya cepat dan ramah. Makanannya selalu fresh dan panas. Terima kasih Mie Mercon Jawara!', 'rating' => 5],
            ['nama' => 'Doni Hermawan', 'pesan' => 'Wonton-nya empuk dan kuahnya gurih. Harga segini untuk kualitas ini, worth it!', 'rating' => 5],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
