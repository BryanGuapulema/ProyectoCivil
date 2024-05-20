<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles de la Obra
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="nombre_de_obra" :value="__('Nombre de la Obra')" />
                        <x-input id="nombre_de_obra" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="nombre_de_obra" :value="$obra->nombre_de_obra" readonly />
                    </div>

                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="tipo_de_obra" :value="__('Tipo de Obra')" />
                        <x-input id="tipo_de_obra" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="tipo_de_obra" :value="$obra->tipo_de_obra" readonly />
                    </div>

                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="nombre_estudiante" :value="__('Nombre del Estudiante')" />
                        @foreach ($obra->users as $user)
                            <x-input id="nombre_estudiante" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="nombre_estudiante" :value="$user->name" readonly />
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="fecha" :value="__('Fecha')" />
                        <x-input id="fecha" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="fecha" :value="$obra->fecha" readonly />
                    </div>

                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="latitud" :value="__('Latitud')" />
                        <x-input id="latitud" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="latitud" :value="$obra->latitud" readonly />
                    </div>

                    <div class="mt-5">
                        <x-label class="text-gray-700 dark:text-gray-300" for="longitud" :value="__('Longitud')" />
                        <x-input id="longitud" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="longitud" :value="$obra->longitud" readonly />
                    </div>

                    <div class="mt-5">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $obra->latitud }},{{ $obra->longitud }}" target="_blank" class="text-gray-600 dark:text-gray-300">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                                Ir a la ubicación
                            </button>
                        </a>
                    </div>
                    

                    <div class="flex items-center justify-between mt-5">
                        <a href="{{ route('obras.index') }}" class="text-sm text-gray-600 dark:text-gray-400 underline">Volver a la lista de obras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
