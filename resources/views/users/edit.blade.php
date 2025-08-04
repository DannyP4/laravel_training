<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('User Edit') }}
                </div>
            </div>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full"
                                    type="text"
                                    name="first_name"
                                    value="{{ $user->first_name }}"
                                    autocomplete="first_name" /><br>

                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full"
                                    type="text"
                                    name="last_name"
                                    value="{{ $user->last_name }}"
                                    autocomplete="last_name" /><br>

                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full"
                                    type="text"
                                    name="username"
                                    value="{{ $user->username }}"
                                    autocomplete="username" /><br>

                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <div class="flex items-center">
                        <span class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 px-3 py-2 rounded-l-md">+84</span>
                        <x-text-input id="phone_number" class="block mt-1 w-full rounded-l-none"
                                        type="text"
                                        name="phone_number"
                                        value="{{ $user->phone_number }}"
                                        autocomplete="phone_number" />
                    </div><br>

                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                    type="email"
                                    name="email"
                                    value="{{ $user->email }}"
                                    autocomplete="email" />

                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Edit') }}
                </x-primary-button>
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-4">
                    {{ __('Cancel') }}
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
