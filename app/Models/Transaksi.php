<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'produk_id',
        'cabang_id',
        'users_id',
        'total_harga',
        'qty',
        'tanggal_transaksi',
    ];
}

