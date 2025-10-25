@extends('layouts.app')

@section('title', 'Checkout - Mie Mercon Jawara')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Form Checkout -->
        <div class="col-lg-8 mb-4">
            <h2 class="mb-4" style="color: var(--mercon-500); font-weight: 700;">
                <i class="fas fa-shopping-cart"></i> Checkout Pesanan
            </h2>

            <!-- Step Indicator -->
            <div class="mb-4">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="step-circle active" style="background-color: var(--mercon-500); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: 700;">1</div>
                        <p class="mt-2" style="font-size: 0.9rem; font-weight: 600;">Data Pelanggan</p>
                    </div>
                    <div class="col-4">
                        <div class="step-circle" style="background-color: #ddd; color: #666; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: 700;">2</div>
                        <p class="mt-2" style="font-size: 0.9rem; font-weight: 600;">Pembayaran</p>
                    </div>
                    <div class="col-4">
                        <div class="step-circle" style="background-color: #ddd; color: #666; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: 700;">3</div>
                        <p class="mt-2" style="font-size: 0.9rem; font-weight: 600;">Konfirmasi</p>
                    </div>
                </div>
            </div>

            <!-- Form Data Pelanggan -->
            <div class="card mb-4" style="border: 2px solid #f0f0f0;">
                <div class="card-header" style="background-color: var(--mercon-500); color: white; border-radius: 12px 12px 0 0;">
                    <h5 style="margin: 0; font-weight: 700;">
                        <i class="fas fa-user"></i> Data Pelanggan
                    </h5>
                </div>
                <div class="card-body">
                    <form id="checkoutForm" novalidate>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Nama Lengkap <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="nama_pelanggan" placeholder="Masukkan nama lengkap Anda" required style="border-radius: 8px; padding: 0.75rem;">
                            <div class="invalid-feedback">Nama lengkap harus diisi</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="contoh@email.com" required style="border-radius: 8px; padding: 0.75rem;">
                            <div class="invalid-feedback">Email harus valid</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Nomor Kontak (WhatsApp) <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #f8f9fa; border-radius: 8px 0 0 8px;">+62</span>
                                <input type="tel" class="form-control" id="kontak" placeholder="812-7449-0948" required style="border-radius: 0 8px 8px 0; padding: 0.75rem;">
                            </div>
                            <div class="invalid-feedback">Nomor kontak harus diisi</div>
                            <small class="text-muted">Gunakan nomor WhatsApp untuk konfirmasi pesanan</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Alamat Pengiriman <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat lengkap pengiriman" required style="border-radius: 8px; padding: 0.75rem;"></textarea>
                            <div class="invalid-feedback">Alamat harus diisi</div>
                            <small class="text-muted">Sertakan detail seperti nomor rumah, RT/RW, dan landmark</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Catatan Tambahan (Opsional)</label>
                            <textarea class="form-control" id="catatan" rows="2" placeholder="Contoh: Tidak terlalu pedas, tanpa bawang, dll" style="border-radius: 8px; padding: 0.75rem;"></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="card" style="border: 2px solid #f0f0f0;">
                <div class="card-header" style="background-color: var(--mercon-500); color: white; border-radius: 12px 12px 0 0;">
                    <h5 style="margin: 0; font-weight: 700;">
                        <i class="fas fa-credit-card"></i> Metode Pembayaran
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="payment-option" onclick="selectPayment('transfer_bank')" style="padding: 1rem; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                <input type="radio" name="metode_pembayaran" value="transfer_bank" id="transfer_bank" style="margin-right: 0.5rem;">
                                <label for="transfer_bank" style="cursor: pointer; margin: 0; font-weight: 600;">
                                    <i class="fas fa-university"></i> Transfer Bank
                                </label>
                                <p style="margin: 0.5rem 0 0 1.5rem; font-size: 0.85rem; color: #666;">BCA, Mandiri, BNI</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-option" onclick="selectPayment('dana')" style="padding: 1rem; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                <input type="radio" name="metode_pembayaran" value="dana" id="dana" style="margin-right: 0.5rem;">
                                <label for="dana" style="cursor: pointer; margin: 0; font-weight: 600;">
                                    <i class="fas fa-wallet"></i> DANA
                                </label>
                                <p style="margin: 0.5rem 0 0 1.5rem; font-size: 0.85rem; color: #666;">Dompet digital</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-option" onclick="selectPayment('gopay')" style="padding: 1rem; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                <input type="radio" name="metode_pembayaran" value="gopay" id="gopay" style="margin-right: 0.5rem;">
                                <label for="gopay" style="cursor: pointer; margin: 0; font-weight: 600;">
                                    <i class="fas fa-mobile-alt"></i> GoPay
                                </label>
                                <p style="margin: 0.5rem 0 0 1.5rem; font-size: 0.85rem; color: #666;">Dari Gojek</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-option" onclick="selectPayment('ovo')" style="padding: 1rem; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                <input type="radio" name="metode_pembayaran" value="ovo" id="ovo" style="margin-right: 0.5rem;">
                                <label for="ovo" style="cursor: pointer; margin: 0; font-weight: 600;">
                                    <i class="fas fa-credit-card"></i> OVO
                                </label>
                                <p style="margin: 0.5rem 0 0 1.5rem; font-size: 0.85rem; color: #666;">Dompet digital</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-option" onclick="selectPayment('cash')" style="padding: 1rem; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                <input type="radio" name="metode_pembayaran" value="cash" id="cash" style="margin-right: 0.5rem;">
                                <label for="cash" style="cursor: pointer; margin: 0; font-weight: 600;">
                                    <i class="fas fa-money-bill"></i> Bayar di Tempat
                                </label>
                                <p style="margin: 0.5rem 0 0 1.5rem; font-size: 0.85rem; color: #666;">COD (Cash on Delivery)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 80px; border: 2px solid #f0f0f0;">
                <div class="card-header" style="background-color: var(--mercon-500); color: white; border-radius: 12px 12px 0 0;">
                    <h5 style="margin: 0; font-weight: 700;">
                        <i class="fas fa-receipt"></i> Ringkasan Pesanan
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Order Items -->
                    <div id="orderSummary" style="max-height: 350px; overflow-y: auto; margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 2px solid #f0f0f0;"></div>

                    <!-- Pricing Breakdown -->
                    <div style="margin-bottom: 1rem;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                            <span style="color: #666;">Subtotal:</span>
                            <span id="subtotal" style="font-weight: 600;">Rp 0</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                            <span style="color: #666;">Ongkir:</span>
                            <span id="ongkir" style="font-weight: 600;">Rp 0</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; padding-top: 0.75rem; border-top: 1px solid #eee;">
                            <span style="font-weight: 700; font-size: 1.1rem;">Total:</span>
                            <span id="summaryTotal" style="font-weight: 700; font-size: 1.2rem; color: var(--mercon-500);">Rp 0</span>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div style="background-color: #f8f9fa; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                        <p style="margin: 0; font-size: 0.85rem; color: #666;">
                            <i class="fas fa-info-circle" style="color: var(--mercon-500); margin-right: 0.5rem;"></i>
                            Pesanan akan dikonfirmasi melalui WhatsApp dalam 5 menit
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <button class="btn btn-primary w-100 btn-lg" onclick="submitOrder()" style="border-radius: 8px; font-weight: 700; margin-bottom: 0.75rem;">
                        <i class="fas fa-check-circle"></i> Pesan Sekarang
                    </button>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary w-100" style="border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-arrow-left"></i> Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        if (cart.length === 0) {
            showToast('Keranjang kosong, silakan pilih produk terlebih dahulu', 'error');
            setTimeout(() => {
                window.location.href = '{{ route("produk.index") }}';
            }, 2000);
            return;
        }

        displayOrderSummary(cart);
    });

    // Display order summary
    function displayOrderSummary(cart) {
        let subtotal = 0;
        const summary = document.getElementById('orderSummary');
        summary.innerHTML = '';

        cart.forEach(item => {
            subtotal += item.subtotal;
            const itemHTML = `
                <div style="padding: 0.75rem 0; border-bottom: 1px solid #f0f0f0;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.25rem;">
                        <p style="margin: 0; font-weight: 600; font-size: 0.95rem;">${item.nama_produk}</p>
                        <p style="margin: 0; font-weight: 600; color: var(--mercon-500);">Rp ${item.subtotal.toLocaleString('id-ID')}</p>
                    </div>
                    <p style="margin: 0.25rem 0; font-size: 0.85rem; color: #999;">
                        ${item.porsi} × ${item.kuantitas}
                        ${item.level_pedas ? ' • Level ' + item.level_pedas : ''}
                    </p>
                    ${item.toppings && item.toppings.length > 0 ? `
                        <p style="margin: 0.25rem 0; font-size: 0.8rem; color: #999;">
                            Topping: ${item.toppings.join(', ')}
                        </p>
                    ` : ''}
                </div>
            `;
            summary.insertAdjacentHTML('beforeend', itemHTML);
        });

        // Update totals
        const ongkir = 0; // Bisa disesuaikan berdasarkan lokasi
        const total = subtotal + ongkir;

        document.getElementById('subtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
        document.getElementById('ongkir').textContent = 'Rp ' + ongkir.toLocaleString('id-ID');
        document.getElementById('summaryTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    // Select payment method
    function selectPayment(method) {
        document.getElementById(method).checked = true;
        // Update visual feedback
        document.querySelectorAll('.payment-option').forEach(option => {
            option.style.borderColor = '#ddd';
            option.style.backgroundColor = 'white';
        });
        event.currentTarget.style.borderColor = 'var(--mercon-500)';
        event.currentTarget.style.backgroundColor = '#fff5f5';
    }

    // Submit order
    function submitOrder() {
        const form = document.getElementById('checkoutForm');
        
        // Validate form
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            showToast('Silakan lengkapi semua data yang diperlukan', 'error');
            return;
        }

        const metode = document.querySelector('input[name="metode_pembayaran"]:checked');
        if (!metode) {
            showToast('Silakan pilih metode pembayaran', 'error');
            return;
        }

        const nama = document.getElementById('nama_pelanggan').value;
        const email = document.getElementById('email').value;
        const kontak = document.getElementById('kontak').value;
        const alamat = document.getElementById('alamat').value;
        const catatan = document.getElementById('catatan').value;

        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const items = cart.map(item => ({
            id_produk: item.id_produk,
            kuantitas: item.kuantitas,
            harga_satuan: item.harga_satuan,
            level_pedas: item.level_pedas,
            toppings: item.toppings,
            subtotal: item.subtotal
        }));

        // Show loading state
        const btn = event.target;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

        fetch('{{ route("order.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                nama_pelanggan: nama,
                email: email,
                kontak: kontak,
                alamat: alamat,
                catatan: catatan,
                metode_pembayaran: metode.value,
                items: items
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.removeItem('cart');
                showToast('✓ Pesanan berhasil dibuat! Silakan cek WhatsApp untuk konfirmasi.', 'success');
                setTimeout(() => {
                    window.location.href = '{{ route("home") }}';
                }, 3000);
            } else {
                showToast(data.message || 'Terjadi kesalahan saat membuat pesanan', 'error');
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Terjadi kesalahan saat membuat pesanan', 'error');
            btn.disabled = false;
            btn.innerHTML = originalText;
        });
    }
</script>
@endsection
@endsection
