@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Mie Mercon Jawara')

@section('content')
<div class="container py-5">
    <div class="row d-flex align-items-stretch g-5">
        <!-- Gambar Produk -->
        <div class="col-lg-6 d-flex">
            <div class="w-100 shadow rounded-4 overflow-hidden d-flex align-items-center justify-content-center" 
                 style="background-color: #fafafa; min-height: 480px;">
                <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : '/placeholder.svg?height=500&width=500' }}"
                     alt="{{ $produk->nama_produk }}"
                     class="img-fluid h-100 w-100"
                     style="object-fit: cover;">
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-lg-6 d-flex">
            <div class="card border-0 shadow-sm rounded-4 p-4 w-100 d-flex flex-column justify-content-between">
                <div>
                    <h1 class="fw-bold mb-2" style="color: var(--mercon-500);">{{ $produk->nama_produk }}</h1>
                    <p class="text-muted mb-1">{{ $produk->porsi }}</p>
                    <p class="text-secondary mb-4">{{ $produk->deskripsi }}</p>

                    <!-- Harga Dasar -->
                    <div class="mb-3">
                        <h5 class="fw-bold text-dark">Harga Dasar</h5>
                        <p class="h4 mb-0" style="color: var(--mercon-500);" id="basePrice">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- Level Pedas -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Pilih Level Pedas</label>
                        <select class="form-select rounded-3" id="levelPedas" onchange="updatePrice()">
                            <option value="">-- Pilih Level --</option>
                            @foreach($levelPedas as $level)
                                <option value="{{ $level->id_level }}" data-harga="{{ $level->tambahan_harga }}">
                                    {{ $level->nama_level }} (+Rp {{ number_format($level->tambahan_harga, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Topping -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Pilih Topping (Opsional)</label>
                        <div class="ps-1">
                            @foreach($toppings as $topping)
                                <div class="form-check mb-2">
                                    <input class="form-check-input topping-checkbox" type="checkbox"
                                           value="{{ $topping->id_produk }}"
                                           data-harga="{{ $topping->harga }}"
                                           data-nama="{{ $topping->nama_produk }}"
                                           id="topping{{ $topping->id_produk }}"
                                           onchange="updatePrice()">
                                    <label class="form-check-label" for="topping{{ $topping->id_produk }}">
                                        {{ $topping->nama_produk }} 
                                        <span class="text-muted">(+Rp {{ number_format($topping->harga, 0, ',', '.') }})</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Jumlah -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Jumlah</label>
                        <div class="input-group" style="width: 185px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseQty()">−</button>
                            <input type="number" class="form-control text-end" id="quantity" value="1" min="1">
                            <button class="btn btn-outline-secondary" type="button" onclick="increaseQty()">+</button>
                        </div>
                    </div>

                    <!-- Total Harga -->
                    <div class="border-top pt-3 mb-4">
                        <h5 class="fw-bold text-dark">Total Harga</h5>
                        <p class="h3 fw-semibold" style="color: var(--mercon-500);" id="totalPrice">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <!-- Tombol Tambah ke Keranjang -->
                <button class="btn w-100 py-3 fw-semibold text-white mt-auto"
                        style="background-color: var(--mercon-500); border-radius: 12px;"
                        onclick="addToCart()">
                    <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    const basePrice = {{ $produk->harga }};

    function updatePrice() {
        let qty = parseInt(document.getElementById('quantity').value);
        let total = basePrice * qty;

        const levelSelect = document.getElementById('levelPedas');
        if (levelSelect.value) {
            total += parseInt(levelSelect.options[levelSelect.selectedIndex].dataset.harga) * qty;
        }

        document.querySelectorAll('.topping-checkbox:checked').forEach(cb => {
            total += parseInt(cb.dataset.harga) * qty;
        });

        document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
        return total;
    }

    function increaseQty() {
        let qty = document.getElementById('quantity');
        qty.value = parseInt(qty.value) + 1;
        updatePrice();
    }

    function decreaseQty() {
        let qty = document.getElementById('quantity');
        if (qty.value > 1) {
            qty.value = parseInt(qty.value) - 1;
            updatePrice();
        }
    }

    function addToCart() {
        const item = {
            id_produk: {{ $produk->id_produk }},
            nama_produk: '{{ $produk->nama_produk }}',
            porsi: '{{ $produk->porsi }}',
            kuantitas: parseInt(document.getElementById('quantity').value),
            harga_satuan: basePrice,
            level_pedas: document.getElementById('levelPedas').value || null,
            toppings: Array.from(document.querySelectorAll('.topping-checkbox:checked')).map(cb => ({
                id: cb.value,
                nama: cb.dataset.nama,
                harga: cb.dataset.harga
            })),
            subtotal: updatePrice()
        };

        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        cart.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));

        showToast('Produk berhasil ditambahkan ke keranjang!');
    }
</script>
@endsection
@endsection
