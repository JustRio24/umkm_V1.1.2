@extends('layouts.app')

@section('title', 'Tentang Kami - Mie Mercon Jawara')

@section('content')
<style>
    :root {
        --mercon-red: #D62828;
        --mercon-dark: #1a1a1a;
        --mercon-hot: #ff4d4d;
        --mercon-bg: #fff7f7;
    }

    body {
        background-color: var(--mercon-bg);
        font-family: 'Poppins', sans-serif;
    }

    /* === HERO SECTION === */
    .hero-section {
        text-align: center;
        padding: 4rem 1rem 3rem;
        background: linear-gradient(135deg, var(--mercon-red) 0%, var(--mercon-dark) 100%);
        color: #fff;
        border-radius: 0 0 40px 40px;
    }

    .hero-section h1 {
        font-weight: 700;
        font-size: 2.6rem;
    }

    .hero-section p {
        max-width: 700px;
        margin: 1rem auto;
        font-size: 1.1rem;
        color: #f5f5f5;
    }

    /* === CONTENT SECTION === */
    .info-section {
        padding: 3rem 1rem 5rem;
        max-width: 1000px;
        margin: auto;
    }

    .info-block {
        margin-bottom: 3rem;
        text-align: center;
    }

    .info-icon {
        font-size: 2.3rem;
        color: var(--mercon-red);
        margin-bottom: 1rem;
    }

    .info-title {
        font-weight: 600;
        color: var(--mercon-red);
        font-size: 1.6rem;
        margin-bottom: 0.5rem;
    }

    .info-text {
        color: #333;
        line-height: 1.7;
        font-size: 1rem;
    }

    iframe {
        border-radius: 12px;
        width: 100%;
        height: 300px;
        border: none;
    }

    .contact-links a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--mercon-red);
        text-decoration: none;
        margin: 0.3rem 0.8rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .contact-links a:hover {
        color: var(--mercon-hot);
        transform: translateY(-2px);
    }

    .hours {
        background: linear-gradient(90deg, rgba(214, 40, 40, 0.1), rgba(255, 77, 77, 0.15));
        border-left: 5px solid var(--mercon-red);
        border-radius: 10px;
        padding: 1rem 1.5rem;
        text-align: left;
        display: inline-block;
        min-width: 250px;
    }

    /* === TWO-COLUMN LAYOUT === */
    .info-flex {
        display: flex;
        justify-content: space-between;
        gap: 3rem;
        flex-wrap: wrap;
        margin-top: 3rem;
    }

    .info-flex > div {
        flex: 1 1 45%;
        text-align: center;
    }

    /* === SEPARATOR === */
    .separator {
        width: 120px;
        height: 4px;
        border-radius: 2px;
        background: linear-gradient(to right, var(--mercon-red), var(--mercon-hot));
        margin: 2.5rem auto 3rem;
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        .info-title {
            font-size: 1.3rem;
        }
        .separator {
            width: 90px;
            height: 3px;
        }
        .info-flex {
            flex-direction: column;
            gap: 2rem;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="hero-section">
    <h1><i class="fa-solid fa-fire"></i> Tentang Mie Mercon Jawara</h1>
    <p>Mie pedas yang bukan sekadar makanan — tapi pengalaman rasa yang menggugah semangat dan bikin ketagihan 🔥</p>
</section>

<!-- CONTENT SECTION -->
<section class="info-section">

    <!-- Kisah Kami -->
    <div class="info-block">
        <div class="info-icon"><i class="fa-solid fa-bowl-food"></i></div>
        <div class="info-title">Kisah Kami</div>
        <p class="info-text">
            <strong>Mie Mercon Jawara</strong> lahir dari semangat menghadirkan cita rasa pedas khas Nusantara. 
            Dari resep keluarga yang diwariskan turun-temurun, kami menjaga kualitas dan keaslian rasa 
            di setiap mangkuk yang kami sajikan.
        </p>
        <p class="info-text">
            Setiap sajian dibuat dengan bahan pilihan, proses penuh cinta, dan sedikit keberanian — 
            karena pedas sejati datang dari hati ❤️‍🔥.
        </p>
    </div>

    <div class="separator"></div>

    <!-- Lokasi -->
    <div class="info-block">
        <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
        <div class="info-title">Lokasi Kami</div>
        <p class="info-text">Temukan kami di <strong>Talang Kelapa, Palembang</strong></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.8234567890123!2d104.7!3d-2.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwNTQnMDAuMCJTIDEwNMKwNDInMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p class="info-text mt-3">Datang dan rasakan sensasi pedas yang legendaris! 🌶️</p>
    </div>

    <div class="separator"></div>

    <!-- Hubungi Kami & Jam Operasional (Side by Side) -->
    <div class="info-flex">
         
        <div class="info-block">
            <div class="info-icon"><i class="fa-solid fa-phone-volume"></i></div>
            <div class="info-title">Hubungi Kami</div>
            <div class="hours mt-3 mx-auto">
                <p class="info-text mb-1">
                    <a href="https://wa.me/6281274490948" style="text-decoration: none; color: #D62828;" target="_blank">
                      <i class="fa-brands fa-whatsapp"></i> 0812-7449-0948
                    </a>
                  </p>
                  <p class="info-text">
                    <a href="https://instagram.com/mie_mercon_jawara" style="text-decoration: none; color: #D62828;" target="_blank">
                      <i class="fa-brands fa-instagram"></i> @mie_mercon_jawara
                    </a>
                  </p>
                  
            </div>
        </div>

        <div class="info-block">
            <div class="info-icon"><i class="fa-regular fa-clock"></i></div>
            <div class="info-title">Jam Operasional</div>
            <div class="hours mt-3 mx-auto">
                <p class="info-text mb-1"><strong>Senin – Jumat:</strong> 10:00 – 22:00</p>
                <p class="info-text"><strong>Sabtu – Minggu:</strong> 09:00 – 23:00</p>
            </div>
        </div>
    </div>

</section>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a2e0f2f2df.js" crossorigin="anonymous"></script>

@endsection
