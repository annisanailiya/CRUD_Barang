{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Detail Barang</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <tbody>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                                <td class="border border-gray-300 px-4 py-2">{{ $barang->id }}</td>
                            </tr>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Nama Barang</th>
                                <td class="border border-gray-300 px-4 py-2">{{ $barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Stok</th>
                                <td class="border border-gray-300 px-4 py-2">{{ $barang->stok_baru + $barang->stok_bekas }}</td>
                            </tr>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Kategori</th>
                                <td class="border border-gray-300 px-4 py-2">{{ $barang->kategori }}</td>
                            </tr>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Kondisi</th>
                                <td class="border border-gray-300 px-4 py-2">{{ $barang->kondisi }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <x-primary-button>
                            <a href="{{ route('inventor.dashboard-inventor.index') }}">Kembali</a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
