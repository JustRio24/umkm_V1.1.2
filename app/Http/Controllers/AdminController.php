<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Order;
use App\Models\Kategori;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalOrder = Order::count();
        $pendingOrder = Order::where('status', 'pending')->count();
        $recentOrders = Order::latest()->take(5)->get();

        $produk = Produk::with('kategori')->latest()->paginate(6);


        return view('admin.dashboard', compact('totalProduk', 'totalKategori', 'totalOrder', 'pendingOrder', 'recentOrders', 'produk'));
    }
}
