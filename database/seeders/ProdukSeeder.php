<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::firstOrCreate(
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Mie pedas khas Jawara ukuran sedang — pedas menggigit, cocok untuk penikmat level mercon.',
                'gambar' => 'products/1761374396_WhatsApp Image 2025-10-22 at 14.22.27.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Porsi besar, sambal mercon khas Jawara — pas untuk yang butuh tenaga extra.',
                'gambar' => 'products/1761378705_Video cara membuat Resep Mie Gacoan - TOPWISATA.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Jumbo'],
            [
                'harga' => 20000,
                'id_kategori' => 1,
                'deskripsi' => 'Porsi jumbo untuk tantangan pedas sejati.',
                'gambar' => 'products/1761378807_13 Menu Mie Gacoan Terbaru 2025.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton Goreng', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761378558_WhatsApp Image 2025-10-22 at 14.26.01.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton Mercon', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan saus mercon pedas khas Jawara.',
                'gambar' => 'products/1761378492_WhatsApp Image 2025-10-22 at 14.24.38.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton kuah', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761378432_WhatsApp Image 2025-10-22 at 14.28.11.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Black Pepper', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam renyah dengan saus black pepper gurih.',
                'gambar' => 'products/1761378265_Panko-Crusted Chicken Katsu Bowls with Tonkatsu Sauce.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Black Pepper', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam renyah dengan saus black pepper gurih.',
                'gambar' => 'products/1761378295_Crispy Chicken Katsu.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Mercon', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam plus saus mercon pedas khas Jawara.',
                'gambar' => 'chicken-katsu-mercon_sedang.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Mercon', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam plus saus mercon pedas khas Jawara.',
                'gambar' => 'products/1761377820_Crispy Chicken Katsu with Maple Bourbon Glaze.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Cheese', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam renyah dengan saus keju leleh.',
                'gambar' => 'products/1761377612_Korean Cheese Katsu Recipe & Video - Seonkyoung Longest.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu Cheese', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Katsu ayam renyah dengan saus keju leleh.',
                'gambar' => 'products/1761377577_download (8).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Ceker Mercon', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Ceker ayam pedas khas Jawara, empuk dan penuh rasa.',
                'gambar' => 'products/1761374049_ceker.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Nasi Ayam Kremes Sambal Bawang', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Nasi lengkap dengan ayam kremes dan sambal bawang pedas.',
                'gambar' => 'products/1761377524_WhatsApp Image 2025-10-22 at 14.41.38.jpeg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Bakso Aci Original', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Bakso aci gurih; varian Original dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761377473_Resep Bakso Ayam dari @yscooking.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Bakso Aci Mercon', 'porsi' => 'Sedang'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Bakso aci pedas mercon khas Jawara.',
                'gambar' => 'products/1761377386_🍴.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Dimsum Original', 'porsi' => '4 pcs'],
            [
                'harga' => 10000,
                'id_kategori' => 1,
                'deskripsi' => 'Dimsum isi ayam empuk, cocok buat cemilan.',
                'gambar' => 'products/1761377303_download (7).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Dimsum Original', 'porsi' => '6 pcs'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Dimsum isi ayam empuk, cocok buat cemilan.',
                'gambar' => 'products/1761377275_Donna Jos Sia.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Dimsum Mentai', 'porsi' => '6 pcs'],
            [
                'harga' => 25000,
                'id_kategori' => 1,
                'deskripsi' => 'Dimsum dengan topping saus mentai creamy.',
                'gambar' => 'products/1761377246_download (6).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Marimas', 'porsi' => 'Gelas'],
            [
                'harga' => 2000,
                'id_kategori' => 2,
                'deskripsi' => 'Minuman serbuk segar berbagai rasa.',
                'gambar' => 'products/1761377220_download (5).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Pop Ice', 'porsi' => 'Gelas'],
            [
                'harga' => 4000,
                'id_kategori' => 2,
                'deskripsi' => 'Minuman Pop Ice rasa manis segar.',
                'gambar' => 'products/1761377176_7c60a4b4-04fb-4460-9129-73e534f4c36b.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Pop Ice + Cincau', 'porsi' => 'Gelas'],
            [
                'harga' => 5000,
                'id_kategori' => 2,
                'deskripsi' => 'Pop Ice dengan tambahan cincau.',
                'gambar' => 'products/1761377144_download (4).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Beng Beng Drink', 'porsi' => 'Gelas'],
            [
                'harga' => 5000,
                'id_kategori' => 2,
                'deskripsi' => 'Minuman cokelat Beng Beng yang creamy.',
                'gambar' => 'products/1761377063_beng-beng PNG.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Es Capucino', 'porsi' => 'Gelas'],
            [
                'harga' => 5000,
                'id_kategori' => 2,
                'deskripsi' => 'Minuman capucino dingin.',
                'gambar' => 'products/1761377028_download (2).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Es Capucino + Cincau', 'porsi' => 'Gelas'],
            [
                'harga' => 6000,
                'id_kategori' => 2,
                'deskripsi' => 'Capucino dingin dengan tambahan cincau.',
                'gambar' => 'products/1761376999_download (1).jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Saus Keju', 'porsi' => 'Topping'],
            [
                'harga' => 2000,
                'id_kategori' => 3,
                'deskripsi' => 'Tambahan saus keju leleh.',
                'gambar' => 'products/1761376969_How to thicken sauces without cheese.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Saus Mercon', 'porsi' => 'Topping'],
            [
                'harga' => 1000,
                'id_kategori' => 3,
                'deskripsi' => 'Tambahan saus mercon pedas.',
                'gambar' => 'products/1761376926_Dapurnya d\'ez.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Saus Black Pepper', 'porsi' => 'Topping'],
            [
                'harga' => 2500,
                'id_kategori' => 3,
                'deskripsi' => 'Tambahan saus black pepper gurih.',
                'gambar' => 'products/1761376856_This delicious black pepper sauce.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Telur', 'porsi' => 'Topping'],
            [
                'harga' => 2000,
                'id_kategori' => 3,
                'deskripsi' => 'Tambahan telur.',
                'gambar' => 'products/1761376802_Resep Telur Rebus Apa.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Chicken Katsu', 'porsi' => 'Topping'],
            [
                'harga' => 6000,
                'id_kategori' => 3,
                'deskripsi' => 'Tambahan potongan chicken katsu.',
                'gambar' => 'products/1761376743_chicken katsu curry - smelly lunchbox.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton kuah', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761379043_Pangsit Kuah.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton Goreng', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761379170_Wonton Kering.jpg',
            ]
        );

        Produk::firstOrCreate(
            ['nama_produk' => 'Wonton Mercon', 'porsi' => 'Besar'],
            [
                'harga' => 15000,
                'id_kategori' => 1,
                'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.',
                'gambar' => 'products/1761379396_19ffad99-f333-4bed-8d1a-3f555eb4577d.jpg',
            ]
        );
    }
}
