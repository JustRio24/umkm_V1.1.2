@extends('layouts.app')

@section('title', 'Kelola Pesanan - Mie Mercon Jawara')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4" style="color: var(--mercon-500);">Kelola Pesanan</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Kontak</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->nama_pelanggan }}</td>
                        <td>
                            <a href="https://wa.me/{{ str_replace('-', '', $order->kontak) }}" target="_blank">
                                {{ $order->kontak }}
                            </a>
                        </td>
                        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge" style="background-color: {{ $order->status === 'pending' ? '#FFC107' : '#28a745' }};">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="viewOrder({{ $order->id }})">Lihat</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>
</div>

@section('scripts')
<script>
    function viewOrder(orderId) {
        alert('Detail pesanan #' + orderId);
    }
</script>
@endsection
@endsection
