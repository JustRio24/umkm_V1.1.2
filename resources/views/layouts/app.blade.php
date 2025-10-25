
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mie Mercon Jawara')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --mercon-500: #8B0000;
            --mercon-400: #C0392B;
            --accent: #6B2D2D;
            --neutral-50: #F9F9F9;
            --neutral-100: #F3F3F3;
            --neutral-900: #1A1A1A;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scrollbar-width: none; /* Firefox */
        }

        html::-webkit-scrollbar {
            display: none; /* Chrome, Safari */
        }

        body {
            background-color: var(--neutral-50);
            color: var(--neutral-900);
            overflow-x: hidden !important;
        }

        /* Navbar */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--mercon-500) !important;
        }

        .nav-link {
            color: var(--neutral-900) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--mercon-500) !important;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--mercon-500);
            border-color: var(--mercon-500);
        }

        .btn-primary:hover {
            background-color: var(--mercon-400);
            border-color: var(--mercon-400);
            transform: scale(1.02);
        }

        .btn-outline-primary {
            color: var(--mercon-500);
            border-color: var(--mercon-500);
        }

        .btn-outline-primary:hover {
            background-color: var(--mercon-500);
            border-color: var(--mercon-500);
        }

        /* Badge */
        .badge {
            background-color: var(--mercon-400);
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
        }

        /* Footer */
        .footer {
            background-color: var(--neutral-900);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer a {
            color: var(--mercon-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--mercon-500);
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, var(--mercon-500) 0%, var(--accent) 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Toast */
        .toast {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .toast-success {
            background-color: #28a745;
            color: white;
        }

        .toast-error {
            background-color: #dc3545;
            color: white;
        }

        /* Pagination */
        .pagination {
            margin-top: 2rem;
        }

        .page-link {
            color: var(--mercon-500);
            border-color: #ddd;
        }

        .page-link:hover {
            background-color: var(--mercon-500);
            border-color: var(--mercon-500);
            color: white;
        }

        .page-item.active .page-link {
            background-color: var(--mercon-500);
            border-color: var(--mercon-500);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🌶️ Mie Mercon Jawara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <button class="nav-link btn btn-link position-relative" onclick="toggleCart()">
                            🛒 Keranjang
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartBadge" style="display:none;">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <h5>Mie Mercon Jawara</h5>
                    <p>Mie pedas khas Jawara dengan cita rasa autentik dan level pedas yang menggigit.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Kontak</h5>
                    <p>
                        <strong>WhatsApp:</strong> <a href="https://wa.me/6281274490948">0812-7449-0948</a><br>
                        <strong>Instagram:</strong> <a href="https://instagram.com/mie_mercon_jawara">@mie_mercon_jawara</a><br>
                        <strong>Lokasi:</strong> Talang Kelapa
                    </p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Jam Operasional</h5>
                    <p>
                        Senin - Jumat: 10:00 - 22:00<br>
                        Sabtu - Minggu: 09:00 - 23:00
                    </p>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p>&copy; 2025 Mie Mercon Jawara. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Toast Container -->
    <div id="toastContainer" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

    <!-- Cart Drawer -->
    <div id="cartDrawer" style="position: fixed; right: -400px; top: 0; width: 400px; height: 100vh; background: white; box-shadow: -2px 0 8px rgba(0,0,0,0.1); z-index: 1000; transition: right 0.3s ease; overflow-y: auto;">
        <div style="padding: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h5 style="margin: 0;">Keranjang Belanja</h5>
                <button onclick="toggleCart()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer;">×</button>
            </div>
            <div id="cartItems" style="margin-bottom: 1.5rem; max-height: 400px; overflow-y: auto;"></div>
            <hr>
            <div style="margin-bottom: 1rem;">
                <p style="margin: 0.5rem 0;"><strong>Subtotal:</strong> <span id="cartSubtotal">Rp 0</span></p>
                <p style="margin: 0.5rem 0;"><strong>Total:</strong> <span id="cartTotal" style="color: var(--mercon-500); font-size: 1.2rem;">Rp 0</span></p>
            </div>
            <button class="btn btn-primary w-100" onclick="proceedToCheckout()">Lanjut ke Checkout</button>
            <button class="btn btn-outline-secondary w-100 mt-2" onclick="toggleCart()">Lanjut Belanja</button>
        </div>
    </div>

    <!-- Cart Overlay -->
    <div id="cartOverlay" onclick="toggleCart()" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999; display: none;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showToast(message, type = 'success') {
            const toastHTML = `
                <div class="toast toast-${type}" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
            const container = document.getElementById('toastContainer');
            container.insertAdjacentHTML('beforeend', toastHTML);
            const toast = new bootstrap.Toast(container.lastElementChild);
            toast.show();
            setTimeout(() => container.lastElementChild.remove(), 3000);
        }

        function toggleCart() {
            const drawer = document.getElementById('cartDrawer');
            const overlay = document.getElementById('cartOverlay');
            if (drawer.style.right === '-400px') {
                drawer.style.right = '0';
                overlay.style.display = 'block';
                updateCartDisplay();
            } else {
                drawer.style.right = '-400px';
                overlay.style.display = 'none';
            }
        }

        function updateCartDisplay() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartItems = document.getElementById('cartItems');
            const cartBadge = document.getElementById('cartBadge');
            let total = 0;

            cartItems.innerHTML = '';
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-muted">Keranjang kosong</p>';
                cartBadge.style.display = 'none';
            } else {
                cart.forEach((item, index) => {
                    total += item.subtotal;
                    const itemHTML = `
                        <div style="padding: 1rem; border-bottom: 1px solid #eee;">
                            <p style="margin: 0.25rem 0; font-weight: 600;">${item.nama_produk} (${item.porsi})</p>
                            <p style="margin: 0.25rem 0; font-size: 0.9rem; color: #666;">Qty: ${item.kuantitas}</p>
                            <p style="margin: 0.25rem 0; font-size: 0.9rem; color: #666;">Rp ${item.subtotal.toLocaleString('id-ID')}</p>
                            <button onclick="removeFromCart(${index})" class="btn btn-sm btn-outline-danger mt-2">Hapus</button>
                        </div>
                    `;
                    cartItems.insertAdjacentHTML('beforeend', itemHTML);
                });
                cartBadge.textContent = cart.length;
                cartBadge.style.display = 'inline-block';
            }

            document.getElementById('cartSubtotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('cartTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
            showToast('Produk dihapus dari keranjang');
        }

        function proceedToCheckout() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            if (cart.length === 0) {
                showToast('Keranjang masih kosong', 'error');
                return;
            }
            window.location.href = '{{ route("checkout") }}';
        }

        // Update cart badge on page load
        document.addEventListener('DOMContentLoaded', function() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            if (cart.length > 0) {
                document.getElementById('cartBadge').textContent = cart.length;
                document.getElementById('cartBadge').style.display = 'inline-block';
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
