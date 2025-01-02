<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menambah Data Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('pengguna.store') }}" method="POST" class="space-y-4">
                        @csrf    
                        <div class="max-w-xl">    
                            <div >
                                <x-input-label for="name" :value="'Nama'" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required />
                                @error('name') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>      
                            <div>
                                <x-input-label for="email" :value="'Email'" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                                @error('email') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>        
                            <div>
                                <x-input-label for="password" :value="'Password'" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                                @error('password') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>       
                            <div>
                                <x-input-label for="role" :value="'Role'" />
                                <x-select-input id="role" name="role" class="mt-1 block w-full" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                </x-select-input>
                                @error('role') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>       
                            <div>
                                <x-primary-button name="save" value="true">Save</x-primary-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
