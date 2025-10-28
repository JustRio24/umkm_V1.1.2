<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'metode_pembayaran' => 'required|string',
            'items' => 'required|array',
        ]);

        $ongkir = $request->ongkir ?? (($request->metode_pengiriman === 'delivery') ? 10000 : 0);
        $totalHarga = 0;
        foreach ($request->items as $item) {
            $totalHarga += $item['subtotal'];
        }
        $totalHarga += $ongkir;

        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'alamat' => $validated['alamat'],
            'kontak' => $validated['kontak'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'ongkir' => $ongkir,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'id_produk' => $item['id_produk'],
                'kuantitas' => $item['kuantitas'],
                'harga_satuan' => $item['harga_satuan'],
                'level_pedas' => $item['level_pedas'] ?? null,
                'toppings' => json_encode($item['toppings'] ?? []),
            ]);
        }

        return response()->json(['success' => true, 'order_id' => $order->id]);
    }

    public function show($id)
    {
        $order = Order::with(['Items.produk'])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }


    public function downloadInvoice($orderId)
    {
        // Ambil data pesanan beserta relasi item & produk
        $order = Order::with('items.produk')->findOrFail($orderId);

        // Gunakan view yang sudah kamu buat: resources/views/invoice/pdf.blade.php
        $pdf = Pdf::loadView('invoice.pdf', compact('order'));

        // Nama file hasil download
        $filename = 'invoice-' . str_pad($order->id, 5, '0', STR_PAD_LEFT) . '.pdf';

        // Unduh file PDF
        return $pdf->download($filename);
    }

    public function index()
    {
        $orders = Order::with('items')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'batal';
        $order->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan!');
    }
}
