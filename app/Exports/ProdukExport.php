<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaksi;

class ProdukExport implements FromArray, ShouldAutoSize, WithHeadings
{
    public function array(): array
    {
        return Transaksi::exportProduk();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Produk',
            'Kategori',
            'Harga',
            'Jumlah Jual',
        ];
    }
}
