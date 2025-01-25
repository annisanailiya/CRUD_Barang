<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pengguna') }}
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
                    <!-- Tombol Tambah Pengguna -->
                    <div class="mb-4 flex justify-between items-center">
                        <p>{{ __("Tabel Data Pengguna") }}</p>
                        <x-primary-button>
                            <a href="{{ route('admin.tambah-data.create') }}">
                                {{ __('Tambah Data') }}
                            </a>
                        </x-primary-button>
                    </div>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-6">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Role</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr id="user-{{ $user->id }}">
                                    <td class="text-center border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $user->email }}</td>
                                    <td class="border border-gray-300 px-6 py-2">{{ $user->role }}</td>
                                    <td class="border border-gray-300 px-6 py-2">
                                        <div class="flex mr-12 gap-2 justify-center">
                                            <!-- Edit Button -->
                                            <x-primary-button>
                                                <a href="{{ route('admin.data-pengguna.edit', $user->id) }}">Edit</a>
                                            </x-primary-button>
                                            <!-- Delete Button -->
                                            <x-primary-button onclick="deleteUser({{ $user->id }})">Hapus</x-primary-button>
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
                }, 2000);
            }
        });

        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch(`/admin/data-pengguna/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const userRow = document.getElementById(`user-${userId}`);
                        userRow.remove();
                    } else {
                        alert('Failed to delete user.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the user.');
                });
            }
        }
    </script>
</x-app-layout>

