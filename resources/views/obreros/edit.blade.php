<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar Obrero') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('obreros.update', $obrero->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-label for="categoria" :value="__('Categoría')" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="categoria" type="text" name="categoria" :value="$obrero->categoria" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="cantidad" :value="__('Cantidad')" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="cantidad" type="number" name="cantidad" :value="$obrero->cantidad" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="flex items-center justify-between">
                            <x-button>
                                {{ __('Actualizar Obrero') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
