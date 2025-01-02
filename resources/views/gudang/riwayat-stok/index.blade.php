<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Stok Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">   
                    <x-table name="header">
                        <tr class="py-10">
                            <th scope="col">#</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Stok Awal</th>
                            <th scope="col">Stok Keluar</th>
                            <th scope="col">Sisa Stok</th>
                        </tr>
                        @foreach ($stok as $produks)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produks->cabang->nama }}</td>
                            <td>{{ $produks->produk->nama }}</td>
                            <td>{{ $produks->stok_awal }}</td>
                            <td>{{ $produks->stok_keluar }}</td>
                            <td>{{ $produks->sisa_stok }}</td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
