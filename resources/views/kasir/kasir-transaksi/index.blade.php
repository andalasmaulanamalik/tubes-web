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
                    <form method="post" action="{{ route('penjualan.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="cabang_id" value="Cabang Toko" />
                                    <x-select-input id="cabang_id" name="cabang_id" class="mt-1 block w-full" required>
                                    <option value="" disabled selected>Pilih Cabang</option>
                                        @foreach ($cabang as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->nama }}</option>
                                        @endforeach
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->get('cabang_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="user_id" value=""/>
                                    <x-text-input id="user_id" type="hidden" name="user_id" class="mt-1 block w-full"
                                        value="{{ auth()->user()->id }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="produk_id" value="Produk" />
                                    <x-select-input id="produk_id" name="produk_id" class="mt-1 block w-full" required>
                                    <option value="" disabled selected>Pilih Produk</option>
                                        @foreach ($produk as $product)
                                            <option value="{{ $product->id }}" data-harga="{{ $product->harga }}">{{ $product->nama }}</option>
                                        @endforeach
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->get('produk_id')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="quantity" value="Total Barang" />
                                    <x-text-input id="quantity" type="text" name="quantity" class="mt-1 block w-full"
                                        value="{{ old('quantity') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="tanggal_transaksi" value="Tanggal Transaksi" />
                                    <x-text-input id="tanggal_transaksi" type="date" name="tanggal_transaksi" class="mt-1 block w-full"
                                        value="{{ old('tanggal_transaksi') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('tanggal_transaksi')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="total_harga" value="Total Bayar" />
                                    <div class="flex items-center mt-1">
                                        <span class="px-3 py-2 bg-gray-200 border border-gray-300 rounded-l-md">Rp.</span>
                                        <x-text-input id="total_harga" type="number" name="total_harga" class="block w-full rounded-l-none" 
                                            value="{{ old('total_harga') }}" required readonly />
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('total_harga')" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-4 mt-6">
                            <x-secondary-button tag="a" href="">Cancel</x-secondary-button>
                            <x-primary-button name="save" value="true">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const produkSelect = document.getElementById('produk_id');
        const quantityInput = document.getElementById('quantity');
        const totalHargaInput = document.getElementById('total_harga');

        function calculateTotal() {
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            const quantity = quantityInput.value;

            if (harga && quantity) {
                totalHargaInput.value = parseFloat(harga) * parseInt(quantity);
            } else {
                totalHargaInput.value = '';
            }
        }

        produkSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
    });
    </script>
</x-app-layout>