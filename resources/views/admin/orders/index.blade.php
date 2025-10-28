@extends('layouts.app')

@section('title', 'Kelola Pesanan - Mie Mercon Jawara')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: var(--mercon-500);">
            <i class="fas fa-clipboard-list me-2"></i> Kelola Pesanan
        </h1>
        <span class="badge bg-mercon px-3 py-2 fs-6 shadow-sm">
            Total Pesanan: {{ $orders->total() }}
        </span>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead style="background: var(--mercon-100); color: var(--mercon-700);">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th>Nama Pelanggan</th>
                        <th>Kontak</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr class="border-bottom">
                        <td class="fw-semibold px-4 py-3">#{{ $order->id }}</td>
                        <td>{{ $order->nama_pelanggan }}</td>
                        <td>
                            <a href="https://wa.me/{{ str_replace('-', '', $order->kontak) }}" 
                               target="_blank" 
                               class="text-decoration-none text-success fw-semibold">
                                <i class="fab fa-whatsapp me-1"></i>{{ $order->kontak }}
                            </a>
                        </td>
                        <td class="fw-bold text-danger">
                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                        </td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" 
                                  method="POST" 
                                  class="d-flex align-items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" 
                                        class="form-select form-select-sm rounded-pill border-mercon fw-semibold"
                                        style="min-width: 130px;"
                                        onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="batal" {{ $order->status == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ $order->created_at->format('d M Y - H:i') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-mercon rounded-pill px-3"
                                        onclick="viewOrder({{ $order->id }})">
                                    <i class="fas fa-eye me-1"></i> Lihat
                                </button>
                                <form action="{{ route('orders.cancel', $order->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Batalkan pesanan ini?')">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3" 
                                            {{ $order->status == 'batal' ? 'disabled' : '' }}>
                                        <i class="fas fa-times me-1"></i> Batalkan
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                            Belum ada pesanan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-light text-center py-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function viewOrder(orderId) {
        window.location.href = `/admin/orders/${orderId}`;
    }
</script>

<style>
    :root {
        --mercon-100: #fff5f5;
        --mercon-500: #d62828;
        --mercon-700: #9b2226;
    }

    .bg-mercon {
        background-color: var(--mercon-500) !important;
        color: #fff !important;
    }

    .border-mercon {
        border-color: var(--mercon-500) !important;
    }

    .btn-outline-mercon {
        color: var(--mercon-500);
        border-color: var(--mercon-500);
    }

    .btn-outline-mercon:hover {
        background-color: var(--mercon-500);
        color: #fff;
    }

    select.form-select:focus {
        border-color: var(--mercon-500);
        box-shadow: 0 0 0 0.15rem rgba(214, 40, 40, 0.25);
    }
</style>
@endsection
