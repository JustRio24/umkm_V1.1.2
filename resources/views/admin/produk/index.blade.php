@extends('layouts.app')

@section('title', 'Kelola Produk - Mie Mercon Jawara')

@section('content')
<div class="container-fluid py-5 px-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: var(--mercon-500);">
            <i class="fas fa-boxes me-2"></i> Kelola Produk
        </h2>
        <a href="{{ route('admin.produk.create') }}" class="btn text-white fw-semibold shadow-sm" style="background: var(--mercon-500); border-radius: 10px;">
            <i class="fas fa-plus-circle me-1"></i> Tambah Produk
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Search and Filter Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('admin.produk.index') }}" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <form method="GET" action="{{ route('admin.produk.index') }}" class="d-flex gap-2">
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

    <!-- Table Card -->
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">
            @if($produk->count())
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Gambar</th>
                            <th>Nama Produk</th>
                            <th>Porsi</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $item)
                        <tr class="align-middle">
                            <td class="text-center">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                                         alt="{{ $item->nama_produk }}" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $item->nama_produk }}</td>
                            <td>{{ $item->porsi }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2">
                                    {{ $item->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.produk.edit', $item->id_produk) }}" 
                                   class="btn btn-sm btn-warning rounded-3 me-1 shadow-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.produk.destroy', $item->id_produk) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-3 shadow-sm">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
            <!-- Pagination -->
            {{ $produk->appends(request()->query())->links('pagination::bootstrap-5') }}

            @else
            <div class="text-center py-5">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076500.png" alt="No Data" width="120" class="mb-3 opacity-75">
                <h5 class="text-muted mb-3">Belum ada produk yang ditambahkan</h5>
                <a href="{{ route('admin.produk.create') }}" class="btn text-white fw-semibold" style="background: var(--mercon-500);">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Produk Sekarang
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
