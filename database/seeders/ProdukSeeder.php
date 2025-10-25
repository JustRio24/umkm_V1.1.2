<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Mie Mercon
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Mie pedas khas Jawara ukuran sedang — pedas menggigit, cocok untuk penikmat level mercon.', 'gambar' => 'mie-mercon_sedang.jpg'],
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Besar', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Porsi besar, sambal mercon khas Jawara — pas untuk yang butuh tenaga extra.', 'gambar' => 'mie-mercon_besar.jpg'],
            ['nama_produk' => 'Mie Mercon', 'porsi' => 'Jumbo', 'harga' => 20000, 'id_kategori' => 1, 'deskripsi' => 'Porsi jumbo untuk tantangan pedas sejati.', 'gambar' => 'mie-mercon_jumbo.jpg'],
            
            // Wonton
            ['nama_produk' => 'Wonton', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.', 'gambar' => 'wonton_sedang.jpg'],
            ['nama_produk' => 'Wonton', 'porsi' => 'Besar', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.', 'gambar' => 'wonton_besar.jpg'],
            ['nama_produk' => 'Wonton', 'porsi' => 'Jumbo', 'harga' => 20000, 'id_kategori' => 1, 'deskripsi' => 'Pangsit isi ayam lembut dengan kuah hangat khas Jawara.', 'gambar' => 'wonton_jumbo.jpg'],
            
            // Chicken Katsu Black Pepper
            ['nama_produk' => 'Chicken Katsu Black Pepper', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam renyah dengan saus black pepper gurih.', 'gambar' => 'chicken-katsu-black-pepper_sedang.jpg'],
            ['nama_produk' => 'Chicken Katsu Black Pepper', 'porsi' => 'Besar', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam renyah dengan saus black pepper gurih.', 'gambar' => 'chicken-katsu-black-pepper_besar.jpg'],
            
            // Chicken Katsu Mercon
            ['nama_produk' => 'Chicken Katsu Mercon', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam plus saus mercon pedas khas Jawara.', 'gambar' => 'chicken-katsu-mercon_sedang.jpg'],
            ['nama_produk' => 'Chicken Katsu Mercon', 'porsi' => 'Besar', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam plus saus mercon pedas khas Jawara.', 'gambar' => 'chicken-katsu-mercon_besar.jpg'],
            
            // Chicken Katsu Cheese
            ['nama_produk' => 'Chicken Katsu Cheese', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam renyah dengan saus keju leleh.', 'gambar' => 'chicken-katsu-cheese_sedang.jpg'],
            ['nama_produk' => 'Chicken Katsu Cheese', 'porsi' => 'Besar', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Katsu ayam renyah dengan saus keju leleh.', 'gambar' => 'chicken-katsu-cheese_besar.jpg'],
            
            // Ceker Mercon
            ['nama_produk' => 'Ceker Mercon', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Ceker ayam pedas khas Jawara, empuk dan penuh rasa.', 'gambar' => 'ceker-mercon_sedang.jpg'],
            
            // Nasi Ayam Kremes
            ['nama_produk' => 'Nasi Ayam Kremes Sambal Bawang', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Nasi lengkap dengan ayam kremes dan sambal bawang pedas.', 'gambar' => 'nasi-ayam-kremes_sedang.jpg'],
            
            // Bakso Aci
            ['nama_produk' => 'Bakso Aci Original', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Bakso aci gurih; varian Original dengan kuah hangat khas Jawara.', 'gambar' => 'bakso-aci-original_sedang.jpg'],
            ['nama_produk' => 'Bakso Aci Mercon', 'porsi' => 'Sedang', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Bakso aci pedas mercon khas Jawara.', 'gambar' => 'bakso-aci-mercon_sedang.jpg'],
            
            // Dimsum
            ['nama_produk' => 'Dimsum Original', 'porsi' => '4 pcs', 'harga' => 10000, 'id_kategori' => 1, 'deskripsi' => 'Dimsum isi ayam empuk, cocok buat cemilan.', 'gambar' => 'dimsum-original_4pcs.jpg'],
            ['nama_produk' => 'Dimsum Original', 'porsi' => '6 pcs', 'harga' => 15000, 'id_kategori' => 1, 'deskripsi' => 'Dimsum isi ayam empuk, cocok buat cemilan.', 'gambar' => 'dimsum-original_6pcs.jpg'],
            ['nama_produk' => 'Dimsum Mentai', 'porsi' => '6 pcs', 'harga' => 25000, 'id_kategori' => 1, 'deskripsi' => 'Dimsum dengan topping saus mentai creamy.', 'gambar' => 'dimsum-mentai_6pcs.jpg'],
            
            // Minuman
            ['nama_produk' => 'Marimas', 'porsi' => 'Gelas', 'harga' => 2000, 'id_kategori' => 2, 'deskripsi' => 'Minuman serbuk segar berbagai rasa.', 'gambar' => 'marimas_gelas.jpg'],
            ['nama_produk' => 'Pop Ice', 'porsi' => 'Gelas', 'harga' => 4000, 'id_kategori' => 2, 'deskripsi' => 'Minuman Pop Ice rasa manis segar.', 'gambar' => 'pop-ice_gelas.jpg'],
            ['nama_produk' => 'Pop Ice + Cincau', 'porsi' => 'Gelas', 'harga' => 5000, 'id_kategori' => 2, 'deskripsi' => 'Pop Ice dengan tambahan cincau.', 'gambar' => 'pop-ice-cincau_gelas.jpg'],
            ['nama_produk' => 'Beng Beng Drink', 'porsi' => 'Gelas', 'harga' => 5000, 'id_kategori' => 2, 'deskripsi' => 'Minuman cokelat Beng Beng yang creamy.', 'gambar' => 'beng-beng-drink_gelas.jpg'],
            ['nama_produk' => 'Es Capucino', 'porsi' => 'Gelas', 'harga' => 5000, 'id_kategori' => 2, 'deskripsi' => 'Minuman capucino dingin.', 'gambar' => 'es-capucino_gelas.jpg'],
            ['nama_produk' => 'Es Capucino + Cincau', 'porsi' => 'Gelas', 'harga' => 6000, 'id_kategori' => 2, 'deskripsi' => 'Capucino dingin dengan tambahan cincau.', 'gambar' => 'es-capucino-cincau_gelas.jpg'],
            
            // Toppings
            ['nama_produk' => 'Saus Keju', 'porsi' => 'Topping', 'harga' => 2000, 'id_kategori' => 3, 'deskripsi' => 'Tambahan saus keju leleh.', 'gambar' => 'saus-keju_topping.jpg'],
            ['nama_produk' => 'Saus Mercon', 'porsi' => 'Topping', 'harga' => 1000, 'id_kategori' => 3, 'deskripsi' => 'Tambahan saus mercon pedas.', 'gambar' => 'saus-mercon_topping.jpg'],
            ['nama_produk' => 'Saus Black Pepper', 'porsi' => 'Topping', 'harga' => 2500, 'id_kategori' => 3, 'deskripsi' => 'Tambahan saus black pepper gurih.', 'gambar' => 'saus-black-pepper_topping.jpg'],
            ['nama_produk' => 'Telur', 'porsi' => 'Topping', 'harga' => 2000, 'id_kategori' => 3, 'deskripsi' => 'Tambahan telur.', 'gambar' => 'telur_topping.jpg'],
            ['nama_produk' => 'Chicken Katsu', 'porsi' => 'Topping', 'harga' => 6000, 'id_kategori' => 3, 'deskripsi' => 'Tambahan potongan chicken katsu.', 'gambar' => 'chicken-katsu_topping.jpg'],
        ];

        foreach ($products as $product) {
            Produk::create($product);
        }
    }
}
