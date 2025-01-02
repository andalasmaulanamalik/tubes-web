<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaksi;

class TransaksiExport implements ShouldAutoSize, FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return Transaksi::exportRiwayat();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Cabang',
            'Kasir',
            'Nama Produk',
            'Jumlah Pembelian Barang',
            'Total Belanja',
            'Tanggal Transaksi',
        ];
    }
}
