<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class TrackingController extends Controller
{
    public function index()
    {
        // Halaman form input kode order
        return view('tracking.index');
    }

    public function track(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
        ]);

        $order = Order::find($request->order_id);

        if (!$order) {
            return back()->with('error', 'Kode pesanan tidak ditemukan.');
        }

        return view('tracking.result', compact('order'));
    }
}
