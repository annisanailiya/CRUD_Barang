<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pengguna') }}
        </h2>
    </x-slot>

    <div id="main-content" class="py-12">
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
                                            <!-- Detail Button -->
                                            <x-primary-button onclick="showDetailModal({{ json_encode($user) }})">Detail</x-primary-button>
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

    <!-- Modal detail -->
    <div id="detail-modal" class="hidden fixed inset-0 flex items-center justify-center bg-opacity-50 text-white z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full">
            <div class="flex justify-between items-center border-b pb-2">
                <h3 class="text-lg font-semibold">Detail Pengguna</h3>
                <button onclick="closeDetailModal()" class="text-white-500 font-bold">X</button>
            </div>
            <div class="mt-4 flex justify-center">
                <table class="w-1/2 text-left text-gray-800 dark:text-gray-200 items-center">
                    <tbody>
                        <tr>
                            <td class="py-2 font-semibold">Nama</td>
                            <td class="py-2">:</td>
                            <td class="py-2" id="detail-name"></td>
                        </tr>
                        <tr>
                            <td class="py-2 font-semibold">Email</td>
                            <td class="py-2">:</td>
                            <td class="py-2" id="detail-email"></td>
                        </tr>
                        <tr>
                            <td class="py-2 font-semibold">Role</td>
                            <td class="py-2">:</td>
                            <td class="py-2" id="detail-role"></td>
                        </tr>
                    </tbody>
                </table>
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

        function showDetailModal(user) {
            document.getElementById('detail-name').innerText = user.name;
            document.getElementById('detail-email').innerText = user.email;
            document.getElementById('detail-role').innerText = user.role;

            document.getElementById('detail-modal').classList.remove('hidden');
            document.getElementById('main-content').classList.add('blur');
        }

        function closeDetailModal() {
            document.getElementById('detail-modal').classList.add('hidden');
            document.getElementById('main-content').classList.remove('blur');
        }

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

    <style>
        .blur {
        filter: blur(5px);
        transition: all 0.3s ease-in-out;
    }
    </style>
</x-app-layout>

