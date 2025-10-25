@extends('layouts.app')

@section('title', 'Edit Produk - Mie Mercon Jawara')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white" style="background: var(--mercon-500); border-radius: 1rem 1rem 0 0;">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-edit me-2"></i> Edit Produk
                    </h4>
                </div>
                <div class="card-body p-4">
                    
                    {{-- Error Alert --}}
                    @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Form Edit Produk --}}
                    <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Produk</label>
                                <input type="text" 
                                       class="form-control @error('nama_produk') is-invalid @enderror" 
                                       name="nama_produk" 
                                       value="{{ old('nama_produk', $produk->nama_produk) }}" 
                                       placeholder="Contoh: Mie Mercon Level 5" required>
                                @error('nama_produk') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Porsi</label>
                                <input type="text" 
                                       class="form-control @error('porsi') is-invalid @enderror" 
                                       name="porsi" 
                                       value="{{ old('porsi', $produk->porsi) }}" 
                                       placeholder="Contoh: 1 Porsi / 2 Porsi" required>
                                @error('porsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">Rp</span>
                                    <input type="number" 
                                           class="form-control @error('harga') is-invalid @enderror" 
                                           name="harga" 
                                           value="{{ old('harga', $produk->harga) }}" 
                                           placeholder="Contoh: 15000" required>
                                </div>
                                @error('harga') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" required>
                                    <option value="" disabled>Pilih Kategori...</option>
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}" 
                                            {{ old('id_kategori', $produk->id_kategori) == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Deskripsi Produk</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                          name="deskripsi" rows="4" 
                                          placeholder="Tuliskan deskripsi singkat produk...">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                                @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Gambar Produk</label>
                                @if($produk->gambar)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" 
                                         alt="{{ $produk->nama_produk }}" 
                                         class="rounded shadow-sm" 
                                         style="max-width: 220px; height: auto; object-fit: cover;">
                                </div>
                                @endif
                                <input type="file" 
                                       class="form-control @error('gambar') is-invalid @enderror" 
                                       name="gambar" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                @error('gambar') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn text-white px-4" style="background: var(--mercon-500);">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
