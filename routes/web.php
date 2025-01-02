<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang.index');
    Route::get('/cabang/create', [CabangController::class, 'create'])->name('cabang.create');
    Route::post('/cabang', [CabangController::class, 'store'])->name('cabang.store');

    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    

});

Route::middleware('auth', 'role:kasir')->group(function () {
    Route::get('/kasir-transaksi', [KasirController::class, 'index'])->name('penjualan');
    Route::post('/kasir-transaksi', [KasirController::class, 'store'])->name('penjualan.store');
    
});

Route::middleware('auth', 'role:gudang')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

    Route::get('/riwayat-stok', [StokController::class, 'index_gudang'])->name('riwayat.index');
});

Route::middleware('auth', 'role:supervisor')->group(function () {
    Route::get('/riwayat-transaksi', [TransaksiController::class, 'index'])->name('supervisor.index');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/riwayat-transaksi-cabang', [TransaksiController::class, 'riwayatTransaksi'])->name('riwayatTransaksi');
    Route::get('/riwayat-transaksi-cabang/export', [TransaksiController::class, 'exportRiwayat'])->name('riwayatTransaksi.export');

    Route::get('/riwayat-produk-cabang', [ProdukController::class, 'riwayatProduk'])->name('riwayatProduk');
    Route::get('/riwayat-produk-cabang/export', [ProdukController::class, 'exportProduk'])->name('riwayatProduk.export');
    
    
});


require __DIR__.'/auth.php';
