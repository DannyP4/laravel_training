<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Create New User') }}
                </div>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full"
                                    type="text"
                                    name="first_name"
                                    :value="old('first_name')"
                                    autocomplete="first_name" /><br>

                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full"
                                    type="text"
                                    name="last_name"
                                    :value="old('last_name')"
                                    autocomplete="last_name" /><br>

                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full"
                                    type="text"
                                    name="username"
                                    :value="old('username')"
                                    autocomplete="username" /><br>

                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    autocomplete="email" /><br>

                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    autocomplete="new-password" />
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Create') }}
                </x-primary-button>
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-4">
                    {{ __('Cancel') }}
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
