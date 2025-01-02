<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Models\Produk;

class StokController extends Controller
{
    public function index()
    {   
        $produk= Produk::all();
        return view('admin/stok.index', compact('produk'));
    }

    public function index_gudang()
    {   
        $stok = Stok::with('produk', 'cabang')->get();
        return view('gudang/riwayat-stok.index', compact('stok'));
    }
}
