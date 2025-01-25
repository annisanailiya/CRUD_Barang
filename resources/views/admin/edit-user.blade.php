<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.data-pengguna.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Name Field -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Field -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role Field -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <div class="relative">
                                <select id="role" name="role" class="block mt-1 w-full pr-10 py-2 border border-gray-600 rounded-md focus:outline-none focus:ring-2 dark:bg-gray-900 dark:text-gray-600 dark:border-gray-900" required autocomplete="role">
                                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="inventor" {{ old('role') == 'inventor' ? 'selected' : '' }}>Inventator</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
