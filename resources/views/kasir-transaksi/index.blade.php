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
                    <form method="post" action="" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="title" value="Cabang Toko" />
                                    <x-text-input id="title" type="text" name="title" class="mt-1 block w-full"
                                        value="{{ old('title') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="author" value="Kasir" />
                                    <x-text-input id="author" type="text" name="author" class="mt-1 block w-full"
                                        value="{{ old('author') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('author')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="year" value="Total Harga" />
                                    <x-text-input id="year" type="number" name="year" class="mt-1 block w-full"
                                        value="{{ old('year') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('year')" />
                                </div>
                            </div>
                            
                            <!-- Kolom Kanan -->
                            <div>
                                <div class="max-w-xl">
                                    <x-input-label for="publisher" value="Nama Barang" />
                                    <x-text-input id="publisher" type="text" name="publisher" class="mt-1 block w-full"
                                        value="{{ old('publisher') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                                </div>
                                <div class="max-w-xl mt-4">
                                    <x-input-label for="city" value="Jumlah Barang" />
                                    <x-text-input id="city" type="text" name="city" class="mt-1 block w-full"
                                        value="{{ old('city') }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
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
</x-app-layout>