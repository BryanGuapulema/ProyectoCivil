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
                    <!-- Botón Añadir Rubro -->
                    <div class="mt-4">
                        <button id="open-popup-btn" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            {{ __('Añadir Rubro') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up modal -->
    <div id="popup-modal" class="fixed inset-0 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                        {{ __('Selecciona una unidad de medida') }}
                    </h3>
                    <div class="mt-2">
                        <div class="grid grid-cols-2 gap-4">
                            <button id="btn-m2" class="w-full px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 transition">m2</button>
                            <button id="btn-m3" class="w-full px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 transition">m3</button>
                            <button id="btn-lts" class="w-full px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 transition">lts</button>
                            <button id="btn-kgs" class="w-full px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 transition">kgs</button>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="close-popup-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('Cerrar') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('open-popup-btn').addEventListener('click', function() {
            document.getElementById('popup-modal').classList.remove('hidden');
        });

        document.getElementById('close-popup-btn').addEventListener('click', function() {
            document.getElementById('popup-modal').classList.add('hidden');
        });

        // Redirigir a obras.create al presionar un botón del pop-up
        document.getElementById('btn-m2').addEventListener('click', function() {
            window.location.href = "{{ route('rubros.create') }}";
        });

        document.getElementById('btn-m3').addEventListener('click', function() {
            window.location.href = "{{ route('obras.create') }}";
        });

        document.getElementById('btn-lts').addEventListener('click', function() {
            window.location.href = "{{ route('obras.create') }}";
        });

        document.getElementById('btn-kgs').addEventListener('click', function() {
            window.location.href = "{{ route('obras.create') }}";
        });
    </script>
</x-app-layout>
