<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form>
                        <!-- Nama Barang Field -->
                        <div class="mt-4">
                            <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                            <x-text-input id="nama_barang" class="block mt-1 w-full" type="text" name="nama_barang" value="{{ $barang->nama_barang }}" readonly />
                        </div>

                        <!-- Stok Field -->
                        <div class="mt-4">
                            <x-input-label for="stok_baru" :value="__('Stok Baru')" />
                            <x-text-input id="stok_baru" class="block mt-1 w-full" type="number" name="stok_baru" value="{{ $barang->stok_baru }}" readonly />
                        </div>

                        <!-- Kategori Field -->
                        <div class="mt-4">
                            <x-input-label for="kategori" :value="__('Kategori')" />
                            <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" value="{{ $barang->kategori }}" readonly />
                        </div>

                        <!-- Kondisi Field -->
                        <div class="mt-4">
                            <x-input-label for="kondisi" :value="__('Kondisi')" />
                            <div class="relative">
                                <span class="block px-3 mt-1 w-full py-2 text-gray-900 dark:text-gray-100 border border-gray-900 rounded-md">
                                    {{ $barang->kondisi == 'baru' ? 'Baru' : 'Bekas' }}
                                </span>
                            </div>
                        </div>

                        <!-- Kembali ke Data Barang Button -->
                        <div class="mt-4">
                            <x-primary-button >
                                <a href="{{ route('inventor.dashboard-inventor') }}" >
                                    {{ __('Kembali ke Data Barang') }}
                                </a>
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
