<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div id="success-alert" class="text-center bg-green-500 text-white p-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between items-center">
                        <p>{{ __("Tabel Data Barang") }}</p>
                        <x-primary-button>
                            <a href="{{ route('inventor.tambah-barang.createBarang') }}">
                                {{ __('Tambah Barang') }}
                            </a>
                        </x-primary-button>
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-300 mt-6">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                                <th class="border border-gray-300 px-4 py-2">Jumlah Stok</th>
                                <th class="border border-gray-300 px-4 py-2">Kategori</th>
                                <th class="border border-gray-300 px-4 py-2">Kondisi</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $index => $barang)
                                <tr id="barang-{{ $barang->id }}">
                                    <td class="text-center border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->nama_barang }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->stok_baru + $barang->stok_bekas }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->kategori }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $barang->kondisi }}</td>
                                    <td class="border border-gray-300 px-6 py-2">
                                        <div class="flex justify-center gap-2">
                                            <x-primary-button>
                                                <a href="{{ route('inventor.dashboard-inventor.detailBarang', $barang->id) }}">Detail</a>
                                            </x-primary-button>
                                            <x-primary-button>
                                                <a href="{{ route('inventor.dashboard-inventor.editBarang', $barang->id) }}">Edit</a>
                                            </x-primary-button>
                                            <x-primary-button onclick="deleteBarang({{ $barang->id }})">Hapus</x-primary-button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 2000); // 2000 milliseconds = 2 seconds
            }
        });

        // Function to send DELETE request
        function deleteBarang(barangId) {
            if (confirm("Are you sure you want to delete this?")) {
                // Send DELETE request to the backend
                fetch(`/inventor/dashboard-inventor/${barangId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const barangRow = document.getElementById(`barang-${barangId}`);
                        barangRow.remove();
                    } else {
                        alert('Failed to delete.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting.');
                });
            }
        }
    </script>
</x-app-layout>
