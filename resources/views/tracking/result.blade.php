@extends('layouts.app')

@section('title', 'Status Pesanan - Mie Mercon Jawara')

@section('content')
<style>
/* 🌶 Desain Card */
.order-status-card {
    border-radius: 20px;
    overflow: hidden;
    background: linear-gradient(to bottom right, #fff, #fff5f5);
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.order-status-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
}

/* 🌶 Progress Bar Container */
.progress-tracker {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 50px 0 30px;
    padding: 0 10px;
}

/* 🌶 Garis utama */
.progress-tracker::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 8%;
    width: 84%;
    height: 5px;
    background-color: #e9ecef;
    transform: translateY(-50%);
    border-radius: 10px;
    z-index: 1;
}

/* 🌶 Garis progress aktif */
.progress-line-fill {
    position: absolute;
    top: 50%;
    left: 8%;
    height: 5px;
    background-color: var(--mercon-500, #dc3545);
    transform: translateY(-50%);
    border-radius: 10px;
    z-index: 2;
    transition: width 1s ease;
}

/* 🌶 Titik status */
.status-step {
    position: relative;
    text-align: center;
    z-index: 3;
    flex: 1;
}

.status-step .circle {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    background-color: #e9ecef;
    color: #999;
}

.status-step.active .circle,
.status-step.done .circle {
    background-color: var(--mercon-500, #dc3545);
    color: white;
    box-shadow: 0 0 10px rgba(220, 53, 69, 0.4);
}

.status-step small {
    display: block;
    margin-top: 8px;
    color: #666;
    font-weight: 500;
}

.status-step.active small {
    color: var(--mercon-500, #dc3545);
    font-weight: 600;
}

/* 🌶 Responsif */
@media (max-width: 768px) {
    .progress-tracker::before {
        left: 12%;
        width: 76%;
    }
    .status-step .circle {
        width: 38px;
        height: 38px;
        font-size: 1rem;
    }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="order-status-card p-4 p-md-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold" style="color: var(--mercon-500, #dc3545);">
                        <i class="fas fa-pepper-hot me-2"></i>Status Pesanan Anda
                    </h2>
                    <p class="text-muted">Pantau perjalanan pesanan pedasmu dari dapur hingga rumah!</p>
                </div>

                <!-- Info utama -->
                <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                    <div class="row text-center text-md-start">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <p class="text-muted mb-1">Kode Pesanan</p>
                            <h5 class="fw-bold text-dark">#{{ $order->id }}</h5>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <p class="text-muted mb-1">Nama Pelanggan</p>
                            <h5 class="fw-bold text-dark">{{ $order->nama_pelanggan }}</h5>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1">Total</p>
                            <h5 class="fw-bold text-danger">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>

                @if($order->status === 'batal')
                    <div class="text-center py-5">
                        <i class="fas fa-times-circle fa-5x text-danger mb-3"></i>
                        <h4 class="fw-bold text-danger mb-2">Pesanan Dibatalkan</h4>
                        <p class="text-muted mb-4">Pesanan ini telah dibatalkan oleh pihak admin atau pelanggan.</p>
                        <a href="{{ route('tracking.index') }}" class="btn btn-outline-danger rounded-pill px-4">
                            <i class="fas fa-arrow-left me-1"></i> Lacak Pesanan Lain
                        </a>
                    </div>
                @else
                    @php
                        $statuses = ['pending', 'diproses', 'dikirim', 'selesai'];
                        $currentIndex = array_search($order->status, $statuses);
                        $progress = (($currentIndex + 1) / count($statuses)) * 84; // sejajar dengan width garis
                    @endphp

                    <!-- Progress Bar -->
                    <div class="progress-tracker">
                        <div class="progress-line-fill" style="width: {{ $progress }}%;"></div>

                        @foreach($statuses as $i => $status)
                            <div class="status-step 
                                {{ $i < $currentIndex ? 'done' : ($i === $currentIndex ? 'active' : '') }}">
                                <div class="circle">
                                    @if($status === 'pending')
                                        <i class="fas fa-hourglass-half"></i>
                                    @elseif($status === 'diproses')
                                        <i class="fas fa-fire"></i>
                                    @elseif($status === 'dikirim')
                                        <i class="fas fa-truck"></i>
                                    @else
                                        <i class="fas fa-check"></i>
                                    @endif
                                </div>
                                <small>{{ ucfirst($status) }}</small>
                            </div>
                        @endforeach
                    </div>

                    <!-- Update info -->
                    <div class="text-center mb-4">
                        <p class="text-muted mb-1">Terakhir diperbarui:</p>
                        <h6 class="fw-semibold">{{ $order->updated_at->format('d M Y, H:i') }}</h6>
                    </div>

                    <!-- Tombol -->
                    <div class="text-center">
                        <a href="{{ route('tracking.index') }}" class="btn btn-danger rounded-pill px-5 py-2 fw-bold shadow-sm">
                            <i class="fas fa-arrow-left me-2"></i> Lacak Pesanan Lain
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const fill = document.querySelector(".progress-line-fill");
    if (fill) {
        fill.style.width = "0";
        setTimeout(() => fill.style.width = "{{ $progress ?? 0 }}%", 300);
    }
});
</script>
@endsection
