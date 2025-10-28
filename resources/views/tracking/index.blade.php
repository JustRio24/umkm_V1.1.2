@extends('layouts.app')

@section('title', 'Lacak Pesanan - Mie Mercon Jawara')

@section('content')
<style>
    /* Custom smooth styling */
    .tracking-wrapper {
        background: linear-gradient(145deg, #fff7f7, #fff);
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(255, 0, 0, 0.08);
        transition: 0.3s;
    }
    .tracking-wrapper:hover {
        box-shadow: 0 10px 28px rgba(255, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    .tracking-icon {
        width: 80px;
        height: 80px;
        background: var(--mercon-500);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 32px;
        margin: 0 auto 1rem;
        box-shadow: 0 6px 16px rgba(255, 0, 0, 0.3);
    }
    .tracking-btn {
        background: var(--mercon-500);
        border: none;
        border-radius: 12px;
        transition: all 0.25s ease-in-out;
        box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
    }
    .tracking-btn:hover {
        background: #c10000;
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(255, 0, 0, 0.35);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="tracking-wrapper p-5">
                <div class="text-center mb-4">
                    <div class="tracking-icon mb-3">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h2 class="fw-bold mb-2" style="color: var(--mercon-500);">
                        Lacak Pesanan Kamu
                    </h2>
                    <p class="text-muted mb-0">Masukkan kode pesanan di bawah untuk melihat status terbaru.</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mt-3" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('tracking.search') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="order_id" class="form-label fw-semibold">Kode Pesanan</label>
                        <input 
                            type="text" 
                            name="order_id" 
                            id="order_id" 
                            class="form-control form-control-lg text-center border-0 shadow-sm rounded-3" 
                            placeholder="Contoh: ORD20251025"
                            required
                            style="background-color:#fff9f9;">
                    </div>

                    <button type="submit" class="btn tracking-btn w-100 fw-semibold py-3 text-white">
                        <i class="fas fa-search me-2"></i> Lacak Sekarang
                    </button>
                </form>

                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="fas fa-circle-info me-1"></i>
                        Pastikan kode sesuai dengan yang tertera di nota pesanan kamu.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
