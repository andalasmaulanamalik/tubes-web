<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\CabangToko;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index()
    {
        $produk = Produk::all(); // Ambil semua data dari tabel 'produk'
        $cabang = Cabang::all(); // Ambil semua data dari tabel 'cabang'
        $users = User::all(); // Ambil semua data dari tabel 'users'

        return view('kasir-transaksi.index', compact('produk', 'cabang', 'users'));
        dd($produk);

    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'cabang_id' => 'required|exists:cabang_toko,id',
            'users_id' => 'required|exists:users,id',
            'total_harga' => 'required|numeric',
            'qty' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Simpan data ke database
        Transaksi::create([
            'produk_id' => $request->produk_id,
            'cabang_id' => $request->cabang_id,
            'users_id' => $request->users_id,
            'total_harga' => $request->total_harga,
            'qty' => $request->qty,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
