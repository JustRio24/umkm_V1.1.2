@extends('layouts.app')

@section('title', 'Detail Pesanan - Mie Mercon Jawara')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4" style="color: var(--mercon-500);">
        <i class="fas fa-receipt me-2"></i> Detail Pesanan #{{ $order->id }}
    </h2>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Informasi Pelanggan</h5>
            <p><strong>Nama:</strong> {{ $order->nama_pelanggan }}</p>
            <p><strong>Kontak:</strong> {{ $order->kontak }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Daftar Produk</h5>
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Topping</th>
                        <th class="text-center">Level Pedas</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->Items as $item)
                    <tr>
                        <td>{{ $item->produk->nama_produk ?? '-' }}</td>
                        <td>
                            @php
                                $toppings = json_decode($item->toppings, true);
                            @endphp
                        
                            @if(!empty($toppings))
                                {{ collect($toppings)->pluck('nama')->join(', ') }}
                            @else
                                -
                            @endif
                        </td>
                        
                        <td class="text-center">{{ $item->level_pedas ?? '-' }}</td>
                        <td class="text-center">{{ $item->kuantitas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5 class="text-end mt-3">
                <strong>Total:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}
            </h5>
        </div>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-mercon rounded-pill">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<style>
    .btn-outline-mercon {
        color: var(--mercon-500);
        border-color: var(--mercon-500);
    }
    .btn-outline-mercon:hover {
        background-color: var(--mercon-500);
        color: #fff;
    }
</style>
@endsection
