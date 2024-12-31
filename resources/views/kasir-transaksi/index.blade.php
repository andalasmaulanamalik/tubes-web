<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="cabang_id" value="Cabang Toko" />
                                    <x-text-input id="cabang_id" type="text" name="cabang_id" class="mt-1 block w-full"
                                        value="{{ old('cabang_id') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('cabang_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="users_id" value="Kasir" />
                                    <x-text-input id="users_id" type="text" name="users_id" class="mt-1 block w-full"
                                        value="{{ old('users_id') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('users_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="total_harga" value="Total Harga" />
                                    <x-text-input id="total_harga" type="number" name="total_harga" class="mt-1 block w-full"
                                        value="{{ old('total_harga') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('total_harga')" />
                                </div>
                            </div>
                            
                            <!-- Kolom Kanan -->
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="produk_id" value="Nama Barang" />
                                    <x-text-input id="produk_id" type="text" name="produk_id" class="mt-1 block w-full"
                                        value="{{ old('produk_id') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('produk_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="qty" value="Jumlah Barang" />
                                    <x-text-input id="qty" type="number" name="qty" class="mt-1 block w-full"
                                        value="{{ old('qty') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('qty')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="tanggal_transaksi" value="Tanggal Transaksi" />
                                    <x-text-input id="tanggal_transaksi" type="date" name="tanggal_transaksi" class="mt-1 block w-full"
                                        value="{{ old('tanggal_transaksi') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('tanggal_transaksi')" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-4 mt-6">
                            <x-secondary-button tag="a" href="{{ route('transaksi.index') }}">Cancel</x-secondary-button>
                            <x-primary-button name="save" value="produk.index">Save</x-primary-button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
