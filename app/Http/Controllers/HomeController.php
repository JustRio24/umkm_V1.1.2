<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->whereIn('id_produk', [1, 4, 7, 13, 14, 16, 18, 19])->get();
        $testimonials = Testimonial::all();
        return view('home', compact('produk', 'testimonials'));
    }
}
