<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    public function index(){
        $produk= Produk::all();
        return view('gudang/produk.index', compact('produk'));
    }

    public function riwayatProduk()
    {
        $user = auth()->user();

        if ($user->role !== 'manager') {
            abort(403, 'Unauthorized.');
        }

        $transaksi = Transaksi::where('cabang_id', $user->cabang->id)->get();

        return view('manager/riwayat-produk.index', compact('transaksi'));
    }

    public function create(){
        return view('gudang/produk.create');
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Produk::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function exportProduk()
    {
        return Excel::download(new ProdukExport(), 'laporan produk.xlsx');
    }
}
