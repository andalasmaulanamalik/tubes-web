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
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

});

Route::middleware('auth', 'role:kasir')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/kasir-transaksi', [KasirController::class, 'index'])->name('penjualan');
    
});


require __DIR__.'/auth.php';
