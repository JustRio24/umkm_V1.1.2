<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);
        $ongkir = 10000;
        $total = $subtotal + $ongkir;

        return view('checkout', compact('cart', 'subtotal', 'ongkir', 'total'));
    }
}
