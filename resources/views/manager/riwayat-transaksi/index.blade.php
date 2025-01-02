<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-primary-button tag="a" href="{{ route('riwayatTransaksi.export') }}" class="mb-4">Export Excel</x-primary-button>
                    <x-table>
                        <tr class="py-10">
                            <th scope="col">#</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Kasir</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah Pembelian</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Tanggal Transaksi</th>
                        </tr>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->cabang->nama }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp.{{ $item->total_harga }}</td>
                            <td>{{ $item->tanggal_transaksi }}</td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
