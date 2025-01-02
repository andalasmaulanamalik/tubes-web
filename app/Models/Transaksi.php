<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable =[
        'cabang_id',
        'user_id',
        'produk_id',
        'quantity',
        'total_harga',
        'tanggal_transaksi',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public static function exportRiwayat()
    {
        $transaksi = self::with('cabang')->get();
        $transaksi_filter = [];
        $no = 1;

        for ($i = 0; $i < $transaksi->count(); $i++) {
            $transaksi_filter[$i]['no'] = $no++;
            $transaksi_filter[$i]['nama_cabang'] = $transaksi[$i]->cabang->nama ?? '-';
            $transaksi_filter[$i]['kasir'] = $transaksi[$i]->users->name;
            $transaksi_filter[$i]['nama_produk'] = $transaksi[$i]->produk->nama;
            $transaksi_filter[$i]['jumlah'] = $transaksi[$i]->quantity;
            $transaksi_filter[$i]['total_belanja'] = $transaksi[$i]->total_harga;
            $transaksi_filter[$i]['tanggal'] = $transaksi[$i]->created_at->format('Y-m-d');
        }

        return $transaksi_filter;
    }

    public static function exportProduk()
    {
        $transaksi = self::with('produk')->get();
        $produk_filter = [];
        $no = 1;

        foreach ($transaksi as $data) {
            if ($data->produk) {
                $produk_filter[] = [
                    'no' => $no++,
                    'nama_produk' => $data->produk->nama,
                    'kategori' => $data->produk->kategori,
                    'harga' => $data->total_harga,
                    'jumlah_jual' => $data->quantity,
                ];
            }
        }

        return $produk_filter;
    }
}
