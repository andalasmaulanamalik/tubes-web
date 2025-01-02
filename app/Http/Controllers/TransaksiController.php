<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Cabang;
use App\Models\User;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {   
        $user= User::all();
        $produk= Produk::all();
        $cabang= Cabang::all();
        $transaksi= Transaksi::all();
        return view('supervisor.index', compact('produk', 'cabang', 'transaksi', 'user'));
        
    }

    public function riwayatTransaksi()
    {   
        $user = auth()->user();

        if ($user->role !== 'manager') {
            abort(403, 'Unauthorized.');
        }

        $transaksi = Transaksi::where('cabang_id', $user->cabang->id)->get();

        return view('manager/riwayat-transaksi.index', compact('transaksi'));

    }

    public function exportRiwayat()
    {
        return Excel::download(new TransaksiExport, 'laporan transaksi.xlsx');
    }

    
}
