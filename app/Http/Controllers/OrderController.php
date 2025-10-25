<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

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

        $totalHarga = 0;
        foreach ($request->items as $item) {
            $totalHarga += $item['subtotal'];
        }

        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'alamat' => $validated['alamat'],
            'kontak' => $validated['kontak'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
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

    public function index()
    {
        $orders = Order::with('items')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
}
