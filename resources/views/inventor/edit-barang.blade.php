<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('inventor.dashboard-inventor.updateBarang', $barang->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Name Field -->
                        <div class="mt-4">
                            <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                            <x-text-input id="nama_barang" class="block mt-1 w-full" type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required autofocus />
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <!-- Stok Baru Field -->
                        <div class="mt-4">
                            <x-input-label for="stok_baru" :value="__('Stok Baru')" />
                            <x-text-input id="stok_baru" class="block mt-1 w-full" type="number" name="stok_baru" value="{{ $barang->stok_baru }}" required />
                            <x-input-error :messages="$errors->get('stok_baru')" class="mt-2" />
                        </div>

                        <!-- Stok Bekas Field -->
                        <div class="mt-4">
                            <x-input-label for="stok_bekas" :value="__('Stok Bekas')" />
                            <x-text-input id="stok_bekas" class="block mt-1 w-full" type="number" name="stok_bekas" value="{{ $barang->stok_bekas }}" required />
                            <x-input-error :messages="$errors->get('stok_bekas')" class="mt-2" />
                        </div>

                        <!-- Kategori Field -->
                        <div class="mt-4">
                            <x-input-label for="kategori" :value="__('Kategori')" />
                            <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" value="{{ $barang->kategori }}" required />
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                        </div>

                        <!-- Kondisi Field -->
                        <div class="mt-4">
                            <x-input-label for="kondisi" :value="__('Kondisi')" />
                            <div class="relative">
                                <select id="kondisi" name="kondisi" class="block mt-1 w-full pr-10 py-2 border border-gray-600 rounded-md focus:outline-none focus:ring-2 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-900" required autocomplete="kondisi">
                                    <option value="" disabled {{ old('kondisi', $barang->kondisi) == '' ? 'selected' : '' }}>Pilih Kondisi</option>
                                    <option value="baru" {{ old('kondisi', $barang->kondisi) == 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="bekas" {{ old('kondisi', $barang->kondisi) == 'bekas' ? 'selected' : '' }}>Bekas</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('kondisi')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <x-primary-button class="bg-blue-500 text-white border-2 border-blue-700 px-4 py-2 rounded">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
