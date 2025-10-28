@extends('layouts.app')

@section('title', 'Produk - Mie Mercon Jawara')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: var(--mercon-500);">Menu Produk</h1>

    <!-- Search and Filter Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('produk.index') }}" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <form method="GET" action="{{ route('produk.index') }}" class="d-flex gap-2">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id_kategori }}" {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <!-- Products Grid -->
    @if($produk->count())
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @foreach($produk as $index => $item)
                <div class="card" style="width: 22.1rem;">
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : '/placeholder.svg?height=200&width=300' }}" 
                         class="card-img-top" alt="{{ $item->nama_produk }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text text-muted">{{ $item->porsi }}</p>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 80) }}</p>
                        <div class="mb-3">
                            <span class="badge bg-secondary">{{ $item->kategori->nama_kategori }}</span>
                        </div>
                        <div class="mt-auto">
                            <p class="h5" style="color: var(--mercon-500);">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.show', $item->id_produk) }}" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <p class="mb-0">Tidak ada produk yang sesuai dengan pencarian Anda</p>
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $produk->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
