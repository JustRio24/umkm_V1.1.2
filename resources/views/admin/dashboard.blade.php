@extends('layouts.app')

@section('title', 'Admin Dashboard - Mie Mercon Jawara')

@section('content')
<div class="container py-4">
    <h1 class="mb-4" style="color: var(--mercon-500);">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Produk</h6>
                    <h2 style="color: var(--mercon-500);">{{ $totalProduk }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Kategori</h6>
                    <h2 style="color: var(--mercon-500);">{{ $totalKategori }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Pesanan</h6>
                    <h2 style="color: var(--mercon-500);">{{ $totalOrder }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Pesanan Pending</h6>
                    <h2 style="color: #FFC107;">{{ $pendingOrder }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header" style="background-color: var(--mercon-500); color: white;">
            <h5 class="mb-0">Aksi Cepat</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.produk.create') }}" class="btn btn-danger me-2">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-danger me-2">
                <i class="fas fa-box"></i> Kelola Produk
            </a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-danger">
                <i class="fas fa-shopping-cart"></i> Lihat Pesanan
            </a>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header" style="background-color: var(--mercon-500); color: white;">
            <h5 class="mb-0">Pesanan Terbaru</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->nama_pelanggan }}</td>
                        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge" style="background-color: {{ $order->status === 'pending' ? '#FFC107' : '#28a745' }};">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endsection
