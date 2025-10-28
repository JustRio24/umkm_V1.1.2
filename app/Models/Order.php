<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['nama_pelanggan', 'email', 'alamat', 'kontak', 'metode_pembayaran', 'metode_pengambilan', 'ongkir', 'total_harga', 'status', 'catatan'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
