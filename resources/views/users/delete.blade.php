<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Delete User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Confirm Delete User') }}</h3>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold mb-2">{{ __('User Details:') }}</h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-medium">{{ __('Name:') }}</span>
                                <span class="ml-2">{{ $user->first_name }} {{ $user->last_name }}</span>
                            </div>
                            <div>
                                <span class="font-medium">{{ __('Username:') }}</span>
                                <span class="ml-2">{{ $user->username }}</span>
                            </div>
                            <div>
                                <span class="font-medium">{{ __('Email:') }}</span>
                                <span class="ml-2">{{ $user->email }}</span>
                            </div>
                            <div>
                                <span class="font-medium">{{ __('Created:') }}</span>
                                <span class="ml-2">{{ $user->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this user?') }}')"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Delete User') }}
                            </button>
                        </form>

                        <a href="{{ route('users.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
