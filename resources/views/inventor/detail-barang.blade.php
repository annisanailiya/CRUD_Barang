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
                        <!-- Gambar Barang -->
                        <div class="mt-6 flex justify-center">
                            <div class="w-full max-w-3xl p-4 bg-gray-900 rounded-lg border-2 border-gray-400">
                                <div class="flex justify-center">
                                    <img src="{{ route('barang.showImage', $barang->id) }}" alt="Gambar Barang" class="h-full object-cover" />
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Detail Barang -->
                        <div class="mt-4 flex justify-center">
                            <table class="w-full text-left text-gray-800 dark:text-gray-200 border-collapse">
                                <tbody>
                                    <!-- Nama Barang Field -->
                                    <tr>
                                        <td class="py-2 font-semibold">Nama Barang</td>
                                        <td class="py-2">:</td>
                                        <td class="py-2" id="nama_barang">{{ $barang->nama_barang }}</td>
                                    </tr>

                                    <!-- Stok Baru Field -->
                                    <tr>
                                        <td class="py-2 font-semibold">Stok Baru</td>
                                        <td class="py-2">:</td>
                                        <td class="py-2" id="stok_baru">{{ $barang->stok_baru }}</td>
                                    </tr>

                                    <!-- Stok Lama Field -->
                                    <tr>
                                        <td class="py-2 font-semibold">Stok Bekas</td>
                                        <td class="py-2">:</td>
                                        <td class="py-2" id="stok_bekas">{{ $barang->stok_bekas }}</td>
                                    </tr>

                                    <!-- Kategori Field -->
                                    <tr>
                                        <td class="py-2 font-semibold">Kategori</td>
                                        <td class="py-2">:</td>
                                        <td class="py-2" id="kategori">{{ $barang->kategori }}</td>
                                    </tr>

                                    <!-- Kondisi Field -->
                                    <tr>
                                        <td class="py-2 font-semibold">Kondisi</td>
                                        <td class="py-2">:</td>
                                        <td class="py-2">
                                            {{ $barang->kondisi == 'baru' ? 'Baru' : 'Bekas' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Deskripsi Barang -->
                        <div class="mt-6 flex justify-center">
                            <div class="w-full max-w-3xl p-4 bg-gray-900 rounded-lg border-2 border-gray-400">
                                <h3 class="text-xl font-semibold mb-4 text-center">Deskripsi Barang</h3>
                                <p id="deskripsi_barang" class="text-gray-700 dark:text-gray-300 text-center">
                                    {{ $barang->deskripsi ?? 'Deskripsi belum tersedia.' }}
                                </p>
                            </div>
                        </div>

                        <!-- Kembali ke Data Barang Button -->
                        <div class="mt-4">
                            <x-primary-button>
                                <a href="{{ route('inventor.dashboard-inventor') }}">

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
