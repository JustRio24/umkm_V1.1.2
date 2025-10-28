
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mie Mercon Jawara')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('logo_mie_jawara.jpeg') }}">
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

        /* 🛒 CART DRAWER STYLING */
        .cart-drawer {
            position: fixed;
            right: -420px;
            top: 0;
            width: 420px;
            height: 100vh;
            background: #fff;
            box-shadow: -4px 0 20px rgba(0,0,0,0.1);
            z-index: 2000;
            transition: right 0.35s ease;
            display: flex;
            flex-direction: column;
        }

        .cart-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--neutral-100);
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 1.5rem;
        }

        .cart-item {
            display: flex;
            gap: 1rem;
            align-items: center;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f1f1f1;
        }

        .cart-item img {
            width: 65px;
            height: 65px;
            border-radius: 10px;
            object-fit: cover;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .cart-item-meta {
            font-size: 0.85rem;
            color: #666;
        }

        .cart-item-price {
            font-weight: 600;
            color: var(--mercon-500);
        }

        .cart-item-remove {
            color: #dc3545;
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
        }

        .cart-footer {
            padding: 1.5rem;
            border-top: 1px solid #eee;
            background-color: #fafafa;
        }

        /* Overlay */
        .cart-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1500;
            display: none;
            transition: opacity 0.3s ease;
        }

        /* When cart is active */
        .cart-drawer.active {
            right: 0;
        }

        .cart-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Mobile */
        @media (max-width: 576px) {
            .cart-drawer {
                width: 100%;
            }
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

            <a class="navbar-brand" href="{{ route('home') }}">
                <img 
                    src="{{ asset('logo_mie_jawara.jpeg') }}" 
                    style="height: 40px; margin-right: 10px;"
                >
                Mie Mercon Jawara
            </a>

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
                        <a class="nav-link" href="{{ route('tracking.index') }}">Lacak Pesanan</a>
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
    <div id="toastContainer" style="position: fixed; top: 20px; left: 20px; z-index: 9999;"></div>

    <!-- 🛒 CART DRAWER -->
    <div id="cartDrawer" class="cart-drawer">
        <div class="cart-header">
            <h5><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h5>
            <button class="btn-close" onclick="toggleCart()"></button>
        </div>

        <div id="cartItems" class="cart-items">
            <p class="text-muted text-center mt-4">Keranjang masih kosong</p>
        </div>

        <div class="cart-footer">
            <div class="d-flex justify-content-between mb-3">
                <span class="fw-semibold">Subtotal</span>
                <span id="cartSubtotal" class="fw-bold text-danger fs-5">Rp 0</span>
            </div>
            <button class="btn btn-primary w-100 mb-2" onclick="proceedToCheckout()">
                <i class="fas fa-cash-register"></i> Lanjut ke Checkout
            </button>
            <button class="btn btn-outline-secondary w-100" onclick="toggleCart()">
                <i class="fas fa-arrow-left"></i> Lanjut Belanja
            </button>
        </div>
    </div>

    <!-- Overlay -->
    <div id="cartOverlay" class="cart-overlay" onclick="toggleCart()"></div>


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
            drawer.classList.toggle('active');
            overlay.classList.toggle('active');
            if (drawer.classList.contains('active')) updateCartDisplay();
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


        function updateCartDisplay() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartItems = document.getElementById('cartItems');
            const badge = document.getElementById('cartBadge');
            let total = 0;

            cartItems.innerHTML = '';

            if (cart.length === 0) {
                cartItems.innerHTML = `<p class="text-muted text-center mt-4">Keranjang masih kosong</p>`;
                badge.style.display = 'none';
            } else {
                cart.forEach((item, index) => {
                    total += item.subtotal;

                    // deteksi topping (bisa array atau string)
                    let topping = item.topping || item.topping_pilihan || '';
                    if (typeof topping === 'string' && topping.trim() !== '') {
                        topping = topping.split(',').map(t => t.trim());
                    }
                    const toppingText = topping && topping.length > 0 
                        ? `<div class="cart-item-topping text-muted small">
                                <i class="fas fa-pepper-hot me-1 text-danger"></i>
                                Topping: ${Array.isArray(topping) ? topping.join(', ') : topping}
                        </div>`
                        : '';

                    // deteksi level pedas
                    const levelPedas = item.level_pedas || item.level || '';
                    const levelText = levelPedas
                        ? `<div class="cart-item-level text-muted small">
                                🌶️ Level Pedas: <strong>${levelPedas}</strong>
                        </div>`
                        : '';

                        const html = `
                            <div class="cart-item mb-3">
                                <div class="cart-item-details">
                                    <div class="cart-item-name fw-semibold">${item.nama_produk} (${item.porsi})</div>
                                    ${
                                        item.level_pedas
                                            ? `<div class="cart-item-meta text-muted">🌶️ Level Pedas: ${item.level_pedas}</div>`
                                            : ''
                                    }
                                    ${
                                        item.toppings && item.toppings.length > 0
                                            ? `<div class="cart-item-meta text-muted">🍗 Topping: ${item.toppings.map(t => t.nama).join(', ')}</div>`
                                            : ''
                                    }
                                    <div class="cart-item-meta text-muted">Qty: ${item.kuantitas}</div>
                                </div>
                                <div class="cart-item-price fw-semibold text-danger">Rp ${item.subtotal.toLocaleString()}</div>
                                <button class="btn btn-sm btn-outline-danger ms-3" onclick="removeFromCart(${index})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        `;
                    cartItems.insertAdjacentHTML('beforeend', html);
                });

                badge.textContent = cart.length;
                badge.style.display = 'inline-block';
            }

            document.getElementById('cartSubtotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('cartTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }


        // Update cart badge on page load
        document.addEventListener('DOMContentLoaded', () => {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            if (cart.length > 0) {
                const badge = document.getElementById('cartBadge');
                badge.textContent = cart.length;
                badge.style.display = 'inline-block';
            }
        });
        </script>
    @yield('scripts')
</body>
</html>
