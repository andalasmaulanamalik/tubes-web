<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Penjualan 2') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="nama" value="Nama " />
                                    <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full"
                                        value="{{ old('nama') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="kategori" value="Kategori" />
                                    <x-select-input id="kategori" name="kategori" class="mt-1 block w-full" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Minuman">Minuman</option>
                                            <option value="Mainan">Mainan</option>
                                            <option value="Elektronik">Elektronik</option>
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                            <div class="max-w-xl mt-4">
                                    <x-input-label for="harga" value="Harga " />
                                    <x-text-input id="harga" type="number" name="harga" class="mt-1 block w-full"
                                        value="{{ old('harga') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="stok" value="Stok " />
                                    <x-text-input id="stok" type="number" name="stok" class="mt-1 block w-full"
                                        value="{{ old('stok') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('stok')" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <x-secondary-button tag="a" href="">Cancel</x-secondary-button>
                            <x-primary-button name="save" value="true">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>