<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menambah Cabang Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="{{ route('cabang.store') }}" method="POST" class="space-y-4">
                    @csrf   
                    <div class="max-w-xl">
                        <x-input-label for="nama" :value="'Nama Cabang'" />
                        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama')" required />
                        @error('nama') 
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="alamat" :value="'Alamat'" />
                        <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat')" required />
                        @error('alamat') 
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>   
                    <div class="max-w-xl">
                        <x-input-label for="user_id" :value="'Manager'" />
                        <x-select-input id="user_id" name="user_id" class="mt-1 block w-full" required>
                            <option value="" disabled selected>Pilih Manager</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}" {{ old('user_id') == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->name }}
                                </option>
                            @endforeach
                        </x-select-input>
                        @error('user_id') 
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>  
                    <div>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
