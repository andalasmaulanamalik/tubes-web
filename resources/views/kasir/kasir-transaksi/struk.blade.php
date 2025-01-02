<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Faktur Transaksi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Faktur Penjualan</h3>
                    <table class="table-auto w-full border-collapse border border-gray-500">
                        <thead>
                            <tr>
                                <th class="border border-gray-500 px-4 py-2">Produk</th>
                                <th class="border border-gray-500 px-4 py-2">Kategori</th>
                                <th class="border border-gray-500 px-4 py-2">Harga</th>
                                <th class="border border-gray-500 px-4 py-2">Jumlah</th>
                                <th class="border border-gray-500 px-4 py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-500 px-4 py-2">{{ $transaksi->produk->nama }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $transaksi->produk->kategori }}</td>
                                <td class="border border-gray-500 px-4 py-2">Rp {{ number_format($transaksi->produk->harga, 2) }}</td>
                                <td class="border border-gray-500 px-4 py-2">{{ $transaksi->quantity }}</td>
                                <td class="border border-gray-500 px-4 py-2">Rp {{ number_format($transaksi->total_harga, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="{{ route('penjualan') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Kembali ke Halaman Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
