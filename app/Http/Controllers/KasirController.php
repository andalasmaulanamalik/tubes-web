<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan Anda menggunakan model Produk
use App\Models\Cabang; // Pastikan model Cabang digunakan
use App\Models\User; // Pastikan model User digunakan
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Mengambil semua data dari tabel 'produk'
        $cabang = Cabang::all(); // Mengambil semua data dari tabel 'cabang'
        $users = User::all(); // Mengambil semua data dari tabel 'users'

        return view('kasir-transaksi.index', compact('produk', 'cabang', 'users'));
    }
}

