<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Http\Requests\StoreKontakRequest;

class KontakController extends Controller
{
    public function store(StoreKontakRequest $request)
    {
        try {
            Kontak::create($request->validated());

            return redirect()->route('kontak')
                ->with('success', 'Terima kasih! Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()->route('kontak')
                ->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }
}
