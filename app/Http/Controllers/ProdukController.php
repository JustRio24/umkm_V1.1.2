<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\StoreProdukRequest;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $query = Produk::with('kategori');

        if (request('search')) {
            $query->where('nama_produk', 'like', '%' . request('search') . '%')
                  ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }

        if (request('kategori')) {
            $query->where('id_kategori', request('kategori'));
        }

        $produk = $query->paginate(5);
        $kategori = Kategori::all();
        
        return view('produk.index', compact('produk', 'kategori'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $levelPedas = \App\Models\LevelPedas::all();
        $toppings = Produk::where('id_kategori', 3)->get();
        return view('produk.show', compact('produk', 'levelPedas', 'toppings'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    public function store(StoreProdukRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('products', $filename, 'public');
            $data['gambar'] = $filename;
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(StoreProdukRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists('products/' . $produk->gambar)) {
                Storage::disk('public')->delete('products/' . $produk->gambar);
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('products', $filename, 'public');
            $data['gambar'] = $filename;
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::disk('public')->exists('products/' . $produk->gambar)) {
            Storage::disk('public')->delete('products/' . $produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
