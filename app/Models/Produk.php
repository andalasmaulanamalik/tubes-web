<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable =[
        'nama',
        'kategori',
        'harga',
        'stok',
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class, 'produk_id');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'produk_id');
    }
}
