@extends('layouts.app')

@section('title', 'Kontak - Mie Mercon Jawara')

@section('content')
<style>
    /* ======== THEME STYLES ======== */
    :root {
        --mercon-red: #D62828;
        --mercon-dark: #1a1a1a;
        --mercon-bg: #fff9f7;
    }

    .contact-section {
        background: var(--mercon-bg);
        padding: 60px 15px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .contact-title {
        background: linear-gradient(135deg, var(--mercon-red) 0%, var(--mercon-dark) 100%);
        color: #fff;
        padding: 40px 20px;
        border-radius: 16px;
        text-align: center;
        margin-bottom: 40px;
    }

    .contact-title h1 {
        font-weight: 700;
        letter-spacing: 1px;
    }

    form .form-control {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 12px 14px;
        transition: border-color 0.3s ease;
    }

    form .form-control:focus {
        border-color: var(--mercon-red);
        box-shadow: 0 0 0 0.2rem rgba(214, 40, 40, 0.2);
    }

    .btn-mercon {
        background: var(--mercon-red);
        border: none;
        border-radius: 12px;
        padding: 12px 20px;
        transition: background 0.3s ease;
        font-weight: 600;
    }

    .btn-mercon:hover {
        background: #b71d1d;
    }
    

    /* ======== CONTACT INFO ======== */
    .contact-info {
        margin-top: 60px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    @media (min-width: 768px) {
        .contact-info {
            flex-direction: row;
            justify-content: space-between;
        }
    }

    .contact-box {
        flex: 1;
        background: #fff;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .contact-box i {
        font-size: 2rem;
        color: var(--mercon-red);
        margin-bottom: 10px;
    }

    .contact-box h5 {
        font-weight: 700;
        color: var(--mercon-dark);
    }

    .contact-link {
        text-decoration: none;
        color: var(--mercon-red);
        font-weight: 600;
    }

    .contact-link:hover {
        text-decoration: none;
        color: #b71d1d;
    }

    hr.divider {
        margin: 60px auto;
        width: 80%;
        border-top: 2px solid rgba(0,0,0,0.1);
    }
</style>

<div class="container py-5">
    <div class="contact-section mx-auto">
        <!-- Title -->
        <div class="contact-title">
            <h1>Hubungi Kami</h1>
            <p class="mb-0">Kami siap melayani pertanyaan, saran, atau pesanan Anda kapan pun!</p>
        </div>

        <!-- Contact Form -->
        <form method="POST" action="{{ route('kontak.store') }}" class="px-md-5">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email aktif" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pesan</label>
                <textarea class="form-control" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-mercon px-5">Kirim Pesan</button>
            </div>
        </form>

        <!-- Separator -->
        <hr class="divider">

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="contact-box">
                <i class="fa-brands fa-whatsapp"></i>
                <h5>WhatsApp</h5>
                <p class="mb-1">0812-7449-0948</p>
                <a href="https://wa.me/6281274490948" target="_blank" class="contact-link">
                    Chat Sekarang
                </a>
            </div>
            <div class="contact-box">
                <i class="fa-brands fa-instagram"></i>
                <h5>Instagram</h5>
                <p class="mb-1">@mie_mercon_jawara</p>
                <a href="https://instagram.com/mie_mercon_jawara" target="_blank" class="contact-link">
                     Lihat Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
