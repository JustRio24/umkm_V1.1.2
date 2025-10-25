@extends('layouts.app')

@section('title', 'Beranda - Mie Mercon Jawara')

@section('content')
<!-- Hero Section -->
<div class="row align-items-center mb-0" style="background: linear-gradient(135deg, #D62828 0%, #1a1a1a 100%); padding: 60px 30px; color: white;">
    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
        <h1 class="display-4 fw-bold mb-3">Mie Mercon Jawara</h1>
        <p class="lead mb-4">Rasakan sensasi pedas autentik khas Jawara dengan cita rasa yang tak terlupakan!</p>
        <a href="{{ route('produk.index') }}" class="btn btn-light btn-lg">
            <i class="fas fa-shopping-bag"></i> Pesan Sekarang
        </a>
    </div>
    <div class="col-md-6 text-center">
        <i class="fas fa-fire" style="font-size: 120px; opacity: 0.3;"></i>
    </div>
</div>

<!-- Parallax Section -->
<x-parallax-section imageUrl="{{ asset('images/image.png') }}" height="10px"></x-parallax-section>

<!-- Features Section -->
<section class="py-5 text-center" style="background: #fffaf7;">
    <div class="container">
        <h2 class="fw-bold mb-3" style="color: var(--mercon-500);">
            Mengapa <span class="text-dark">Mie Mercon Jawara?</span>
        </h2>
        <p class="text-muted mb-5">Kami menghadirkan rasa dan pelayanan terbaik untuk setiap pelanggan.</p>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-6 col-md-4 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-circle mb-3">
                        <i class="fa-solid fa-pepper-hot fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--mercon-500);">Pedas Autentik</h5>
                    <p class="text-muted">Sambal mercon khas Jawara dengan tingkat kepedasan yang bisa kamu pilih dari Level 0 sampai Level 5.</p>
                </div>
            </div>

            <div class="col-10 col-sm-6 col-md-4 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-circle mb-3">
                        <i class="fa-solid fa-bowl-food fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--mercon-500);">Bahan Berkualitas</h5>
                    <p class="text-muted">Menggunakan bahan-bahan segar pilihan terbaik untuk cita rasa yang konsisten dan lezat.</p>
                </div>
            </div>

            <div class="col-10 col-sm-6 col-md-4 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-circle mb-3">
                        <i class="fa-solid fa-bolt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--mercon-500);">Cepat & Segar</h5>
                    <p class="text-muted">Pesanan disiapkan dengan cepat, disajikan panas, dan selalu dalam kondisi terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Parallax Produk -->
<x-parallax-section imageUrl="{{ asset('images/image.png') }}" height="auto">
    <div class="container py-5">
        <div class="mb-5 text-center">
            <h2 class="fw-bold mb-4">Produk Unggulan</h2>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($produk as $item)
                <div class="col-10 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : '/placeholder.svg?height=200&width=300' }}"
                             class="card-img-top img-fluid"
                             alt="{{ $item->nama_produk }}"
                             style="object-fit: cover; height: 200px; width: 100%;">
                        <div class="card-body d-flex flex-column justify-content-between" style="min-height: 250px;">
                            <div>
                                <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                                <p class="card-text text-muted small mb-1">{{ $item->porsi }}</p>
                                <p class="card-text">{{ Str::limit($item->deskripsi, 60) }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                                <span class="h6 mb-0 text-danger fw-semibold">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('produk.show', $item->id_produk) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-parallax-section>

<!-- Testimonials Section -->
<section class="py-5" style="background-color: var(--neutral-100);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: var(--mercon-500);">
            Apa Kata Pelanggan Kami
        </h2>

        <div class="row justify-content-center">
            @foreach($testimonials as $testimonial)
            <div class="col-10 col-sm-6 col-md-4 mb-4">
                <div class="testimonial-item p-4 h-100">
                    <div class="d-flex justify-content-center mb-2">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <i class="fa-solid fa-star text-warning"></i>
                        @endfor
                    </div>
                    <p class="fst-italic text-muted">"{{ $testimonial->pesan }}"</p>
                    <div class="mt-3">
                        <h6 class="fw-bold mb-0" style="color: var(--mercon-500);">— {{ $testimonial->nama }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Pesan Sekarang!</h2>
        <p class="mb-4">Nikmati kelezatan Mie Mercon Jawara dengan berbagai pilihan level pedas dan topping.</p>
        <a href="{{ route('produk.index') }}" class="btn btn-primary btn-lg mb-2">Lihat Menu Lengkap</a>
        <a href="https://wa.me/6281274490948" class="btn btn-outline-primary btn-lg mb-2 ms-2">Hubungi via WhatsApp</a>
    </div>
</section>

<style>
.icon-circle {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--mercon-500), #ff6347);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.icon-circle:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px rgba(255, 50, 50, 0.3);
}

.testimonial-item {
    background: #fff;
    border-radius: 15px;
    border: 1px solid #eee;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}
.testimonial-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(255, 0, 0, 0.1);
}

@media (max-width: 768px) {
    .display-4 { font-size: 2rem; }
    .lead { font-size: 1rem; }
    .card-body { min-height: auto; }
}
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    });
</script>
@endsection

@endsection
