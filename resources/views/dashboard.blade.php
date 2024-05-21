<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mt-8 text-2xl text-gray-900 dark:text-gray-200">
                        Welcome to your dashboard!
                    </div>

                    <div class="mt-6 text-gray-500 dark:text-gray-400">
                        Here is your personalized dashboard. Click the button below to go to the OBRA page.
                    </div>

                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('obras.index') }}" class="bg-blue-500 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Go to OBRA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
