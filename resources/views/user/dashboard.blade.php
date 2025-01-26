<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between items-center">
                        <p>{{ __("Tabel Data Barang") }}</p>
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-300 mt-6">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                                <th class="border border-gray-300 px-4 py-2">Kategori</th>
                                <th class="border border-gray-300 px-4 py-2">Jumlah Stok</th>
                                <th class="border border-gray-300 px-4 py-2">Stok Baru</th>
                                <th class="border border-gray-300 px-4 py-2">Stok Bekas</th>
                                <th class="border border-gray-300 px-4 py-2">Kondisi</th>
                                <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $indexUser => $barang)
                                <tr id="barang-{{ $barang->id }}">
                                    <td class="text-center border border-gray-300 px-4 py-2">{{ $indexUser + 1 }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->nama_barang }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->kategori }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->stok_baru + $barang->stok_bekas }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->stok_baru }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->stok_bekas }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->kondisi }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->deskripsi }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
