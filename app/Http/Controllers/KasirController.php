<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Cabang;
use App\Models\Stok;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class KasirController extends Controller
{
    public function index()
    {   
        $produk= Produk::all();
        $cabang= Cabang::all();
        return view('kasir/kasir-transaksi.index', compact('produk', 'cabang'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'cabang_id' => 'required|exists:cabang_toko,id',
            'user_id' => 'required|exists:users,id',
            'produk_id' => 'required|exists:produk,id',
            'quantity' => 'required|numeric',
            'total_harga' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
        ]);

        $produk = Produk::find($request->produk_id);

        if ($produk->stok < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk transaksi ini.');
        }

        $transaksi = Transaksi::create([
            'cabang_id' => $request->cabang_id,
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'quantity' => $request->quantity,
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);

        $stok = Stok::firstOrCreate(
            ['cabang_id' => $request->cabang_id, 'produk_id' => $request->produk_id],
            [
                'stok_awal' => $produk->stok, 
                'stok_keluar' => $request->quantity ?? 0, 
                'sisa_stok' => $produk->stok - ($request->quantity ?? 0), 
            ]
        );

        $produk->stok -= $request->quantity;
        $produk->save();

        $stok->stok_keluar = $request->quantity;
        $stok->sisa_stok = $stok->stok_awal - $stok->stok_keluar;
        $stok->save();
        
        $data = [
            'transaksi' => $transaksi, // Simpan seluruh data transaksi
            'produk' => $produk,
            'tanggal' => now()->format('d-m-Y H:i:s'),
            'kasir' => auth()->user()->name, // Ganti sesuai autentikasi Anda
        ];
    
        // Generate PDF faktur
        $pdf = Pdf::loadView('kasir/kasir-transaksi.faktur', $data);
    
        // Simpan faktur ke dalam storage
        $pdf->save(storage_path('app/faktur/faktur-transaksi-' . $transaksi->id . '.pdf'));
    
        // Redirect dengan pesan sukses
        return redirect()->route('penjualan')->with('success', 'Penjualan berhasil disimpan dan faktur dibuat.');
    }
}
