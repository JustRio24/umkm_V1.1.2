# Mie Mercon Jawara - E-Commerce UMKM

Aplikasi e-commerce modern untuk UMKM "Mie Mercon Jawara" dengan fitur lengkap untuk manajemen produk, pesanan, dan pengalaman berbelanja yang interaktif.

## Fitur Utama

### Untuk Pelanggan
- **Beranda Menarik**: Hero banner dengan CTA dan testimonial pelanggan
- **Katalog Produk**: Listing produk dengan pagination (5 per halaman)
- **Pencarian & Filter**: Cari produk berdasarkan nama atau kategori
- **Detail Produk**: Pilih level pedas, tambahkan topping, atur jumlah dengan kalkulasi harga real-time
- **Keranjang Belanja**: Slide-in drawer dengan review item dan subtotal
- **Checkout**: Form pemesanan dengan data pelanggan dan metode pembayaran
- **Tentang & Kontak**: Informasi bisnis, lokasi, dan social media links

### Untuk Admin
- **Dashboard**: Ringkasan statistik (total produk, kategori, pesanan, pending orders)
- **Manajemen Produk**: CRUD lengkap dengan upload gambar
- **Manajemen Pesanan**: Lihat semua pesanan dengan status dan kontak pelanggan
- **Autentikasi**: Login admin dengan middleware protection

## Teknologi

- **Framework**: Laravel 10+
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 5, Vanilla JavaScript
- **Styling**: Custom CSS dengan Tailwind utilities
- **Storage**: Local file storage untuk gambar produk

## Instalasi & Setup

### Prasyarat
- PHP 8.1+
- Composer
- MySQL/MariaDB
- Node.js & npm (opsional, untuk asset compilation)

### Langkah Instalasi

1. **Clone Repository**
   \`\`\`bash
   git clone <repository-url>
   cd mie-mercon-jawara
   \`\`\`

2. **Install Dependencies**
   \`\`\`bash
   composer install
   \`\`\`

3. **Setup Environment**
   \`\`\`bash
   cp .env.example .env
   \`\`\`

4. **Generate Application Key**
   \`\`\`bash
   php artisan key:generate
   \`\`\`

5. **Konfigurasi Database**
   Edit file `.env`:
   \`\`\`
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_umkm
   DB_USERNAME=root
   DB_PASSWORD=
   \`\`\`

6. **Jalankan Migrations & Seeders**
   \`\`\`bash
   php artisan migrate --seed
   \`\`\`

7. **Setup Storage Link**
   \`\`\`bash
   php artisan storage:link
   \`\`\`

8. **Jalankan Development Server**
   \`\`\`bash
   php artisan serve
   \`\`\`

   Aplikasi akan berjalan di `http://localhost:8000`

## Akun Default

Untuk login admin, gunakan akun yang dibuat melalui Laravel Breeze:
\`\`\`bash
php artisan tinker
User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
\`\`\`

Atau gunakan command:
\`\`\`bash
php artisan make:user
\`\`\`

## Struktur Database

### Tabel Kategori
- `id_kategori` (INT, PK)
- `nama_kategori` (VARCHAR 50)
- `timestamps`

### Tabel Produk
- `id_produk` (INT, PK)
- `nama_produk` (VARCHAR 100)
- `porsi` (VARCHAR 30)
- `harga` (INT)
- `id_kategori` (FK)
- `deskripsi` (TEXT)
- `gambar` (VARCHAR 255)
- `timestamps`

### Tabel Level Pedas
- `id_level` (INT, PK)
- `nama_level` (VARCHAR 50)
- `tambahan_harga` (INT)
- `timestamps`

### Tabel Orders
- `id` (INT, PK)
- `nama_pelanggan` (VARCHAR)
- `alamat` (TEXT)
- `kontak` (VARCHAR)
- `metode_pembayaran` (VARCHAR)
- `total_harga` (INT)
- `status` (VARCHAR)
- `timestamps`

### Tabel Order Items
- `id` (INT, PK)
- `order_id` (FK)
- `id_produk` (FK)
- `kuantitas` (INT)
- `harga_satuan` (INT)
- `level_pedas` (INT)
- `toppings` (JSON)
- `timestamps`

### Tabel Testimonials
- `id` (INT, PK)
- `nama` (VARCHAR)
- `pesan` (TEXT)
- `rating` (INT)
- `timestamps`

## Konfigurasi Penting

### Upload Gambar Produk
1. Pastikan folder `storage/app/public/products/` sudah ada
2. Gambar akan disimpan otomatis saat upload di admin panel
3. Untuk menggunakan gambar seeded, letakkan file di folder tersebut dengan nama sesuai seeder

### Email Configuration (Opsional)
Edit `.env` untuk setup email notifications:
\`\`\`
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@miemercon.com
\`\`\`

### Google Maps (Opsional)
Untuk embed Google Maps di halaman Tentang, update URL di `resources/views/tentang.blade.php` dengan koordinat lokasi Talang Kelapa.

## Fitur Interaktif

- **Animated Cards**: Hover effect dengan elevation dan shadow
- **Toast Notifications**: Feedback visual untuk aksi (add to cart, delete, etc)
- **Cart Drawer**: Slide-in animation dengan overlay
- **Price Calculator**: Real-time price update saat memilih level pedas dan topping
- **Smooth Scroll**: Internal navigation dengan smooth scrolling
- **Responsive Design**: Mobile-first approach dengan breakpoints untuk tablet dan desktop

## Deployment

### Ke Vercel
1. Push ke GitHub
2. Connect repository ke Vercel
3. Set environment variables di Vercel dashboard
4. Deploy

### Ke Server Tradisional
1. Upload files ke server
2. Setup database dan run migrations
3. Configure web server (Apache/Nginx)
4. Set proper permissions untuk `storage/` dan `bootstrap/cache/`
5. Setup SSL certificate

## Troubleshooting

### Gambar tidak muncul
- Pastikan `php artisan storage:link` sudah dijalankan
- Check permissions folder `storage/app/public/`
- Verify path di database sesuai dengan file yang ada

### Database error
- Pastikan MySQL service berjalan
- Check credentials di `.env`
- Run `php artisan migrate --fresh --seed` untuk reset database

### Cart tidak menyimpan
- Check browser localStorage support
- Clear browser cache dan cookies
- Verify JavaScript tidak ada error di console

## Maintenance

### Backup Database
\`\`\`bash
mysqldump -u root -p db_umkm > backup.sql
\`\`\`

### Clear Cache
\`\`\`bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
\`\`\`

### Update Dependencies
\`\`\`bash
composer update
\`\`\`

## Support & Contact

Untuk pertanyaan atau support:
- WhatsApp: 0812-7449-0948
- Instagram: @mie_mercon_jawara
- Email: admin@miemercon.com

## License

Proprietary - Mie Mercon Jawara UMKM

## Changelog

### v1.1.2 (Initial Release)
- Complete e-commerce functionality
- Admin dashboard dan product management
- Shopping cart dengan checkout
- Order management system
- Responsive design dengan Bootstrap 5
- Search dan filter functionality
- Testimonials section
