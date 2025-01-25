<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('inventor.tambah-barang.storeBarang') }}">
                        @csrf

                        <!-- Nama Barang -->
                        <div>
                            <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                            <x-text-input id="nama_barang" class="block mt-1 w-full" type="text" name="nama_barang" :value="old('nama_barang')" required autofocus autocomplete="nama_barang" />
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <!-- Stok  -->
                        <div class="mt-4">
                            <x-input-label for="stok_baru" :value="__('Stok')" />
                            <x-text-input id="stok_baru" class="block mt-1 w-full" type="number" name="stok_baru" :value="old('stok_baru')" required autocomplete="stok_baru" />
                            <x-input-error :messages="$errors->get('stok_baru')" class="mt-2" />
                        </div>

                        <!-- Kondisi -->
                        <div class="mt-4">
                            <x-input-label for="kondisi" :value="__('Kondisi')" />
                            <div class="relative">
                                <select id="kondisi" name="kondisi" class="block mt-1 w-full pr-10 py-2 border border-gray-600 rounded-md focus:outline-none focus:ring-2 dark:bg-gray-900 dark:text-gray-600 dark:border-gray-900" required autocomplete="kondisi">
                                    <option value="" disabled {{ old('kondisi') ? '' : 'selected' }}>Pilih Kondisi</option>
                                    <option value="baru" {{ old('kondisi') == 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="bekas" {{ old('kondisi') == 'bekas' ? 'selected' : '' }}>Bekas</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('kondisi')" class="mt-2" />
                        </div>

                        <!-- Kategori -->
                        <div class="mt-4">
                            <x-input-label for="kategori" :value="__('Kategori')" />
                            <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" :value="old('kategori')" required autocomplete="kategori" />
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('inventor.dashboard-inventor') }}">
                                {{ __('Kembali ke Data Barang') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Tambah Barang') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
