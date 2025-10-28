<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 20px;
        }
        .company-info h1 {
            margin: 0;
            color: #e74c3c;
            font-size: 28px;
        }
        .company-info p {
            margin: 5px 0;
            font-size: 12px;
            color: #666;
        }
        .invoice-info {
            text-align: right;
        }
        .invoice-info p {
            margin: 5px 0;
            font-size: 12px;
        }
        .invoice-number {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            background-color: #f5f5f5;
            padding: 10px;
            font-weight: bold;
            border-left: 4px solid #e74c3c;
            margin-bottom: 15px;
        }
        .customer-info {
            display: flex;
            justify-content: space-between;
        }
        .customer-info div {
            flex: 1;
        }
        .customer-info p {
            margin: 5px 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            font-size: 12px;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
        }
        .total-section {
            text-align: right;
            margin-bottom: 30px;
        }
        .total-row {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 8px;
            font-size: 12px;
        }
        .total-row span:first-child {
            width: 150px;
            text-align: right;
        }
        .total-row span:last-child {
            width: 100px;
            text-align: right;
            font-weight: bold;
        }
        .grand-total {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #e74c3c;
        }
        .grand-total span:first-child {
            width: 150px;
            text-align: right;
            font-weight: bold;
        }
        .grand-total span:last-child {
            width: 100px;
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            color: #e74c3c;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 11px;
            color: #999;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="company-info">
                <h1>Mie Mercon Jawara</h1>
                <p>Jl. Contoh No. 123, Kota</p>
                <p>Telepon: 0812-7449-0948</p>
            </div>
            <div class="invoice-info">
                <div class="invoice-number">INVOICE #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</div>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                <p><strong>Status:</strong> <span class="status-badge status-pending">{{ ucfirst($order->status) }}</span></p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="section">
            <div class="section-title">Informasi Pelanggan</div>
            <div class="customer-info">
                <div>
                    <p><strong>Nama:</strong> {{ $order->nama_pelanggan }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Telepon:</strong> +62{{ $order->kontak }}</p>
                </div>
                <div>
                    <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
                    <p><strong>Metode Pengambilan:</strong> {{ ucfirst($order->metode_pengambilan) }}</p>
                    <p><strong>Metode Pembayaran:</strong> {{ ucfirst(str_replace('_', ' ', $order->metode_pembayaran)) }}</p>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <div class="section">
            <div class="section-title">Detail Pesanan</div>
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Harga Satuan</th>
                        <th style="text-align: right;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->produk->nama_produk ?? 'Produk' }}</strong>
                            @if($item->level_pedas)
                                <br><small>Level Pedas: {{ $item->level_pedas }}</small>
                            @endif
                            @if(!empty($item->toppings))
                                @php
                                    // Deteksi apakah sudah array atau masih string JSON
                                    $toppings = is_array($item->toppings)
                                        ? $item->toppings
                                        : json_decode($item->toppings, true);

                                    // Jika hasil decode masih bukan array, bungkus jadi array
                                    if (!is_array($toppings)) {
                                        $toppings = [$item->toppings];
                                    }

                                    // Flatten array bersarang (nested array) menjadi 1 dimensi
                                    $toppings = collect($toppings)->flatten()->filter()->toArray();
                                @endphp

                                @if(count($toppings) > 0)
                                    <br><small>Topping: {{ implode(', ', $toppings) }}</small>
                                @endif
                            @endif


                        </td>
                        
                        <td style="text-align: center;">{{ $item->kuantitas }}</td>
                        <td style="text-align: right;">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td style="text-align: right;">Rp {{ number_format($item->harga_satuan * $item->kuantitas, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><strong>Ongkir:</strong></td>
                        <td>Rp {{ number_format($order->ongkir, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><strong>Total:</strong></td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total Section -->
        <div class="total-section">
            <div class="total-row">
                <span>Subtotal:</span>
                <span>Rp {{ number_format($order->total_harga - $order->ongkir, 0, ',', '.') }}</span>
            </div>
            <div class="total-row">
                <span>Ongkir:</span>
                <span>Rp {{ number_format($order->ongkir, 0, ',', '.') }}</span>
            </div>
            <div class="grand-total">
                <span>TOTAL:</span>
                <span>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Notes -->
        @if($order->catatan)
        <div class="section">
            <div class="section-title">Catatan Tambahan</div>
            <p style="font-size: 12px;">{{ $order->catatan }}</p>
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>Terima kasih telah berbelanja di Mie Mercon Jawara!</p>
            <p>Invoice ini dicetak pada {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
