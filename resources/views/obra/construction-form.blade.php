<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Obra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('obras.store') }}">
                        @csrf
                        <div class="mb-4">
                            <x-label for="nombre_de_obra" value="{{ __('Nombre de la Obra') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="nombre_de_obra" type="text" name="nombre_de_obra" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>


                        <div class="mb-4">
                            <x-label for="tipo_de_obra" value="{{ __('Tipo de Obra') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="tipo_de_obra" name="tipo_de_obra" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Seleccione el tipo de obra</option>
                                <option value="Vivienda unifamiliar hasta dos niveles">Vivienda unifamiliar hasta dos niveles</option>
                                <option value="Vivienda unifamiliar mas de dos niveles">Vivienda unifamiliar mas de dos niveles</option>
                                <option value="Vivienda en edificio multifamiliar">Vivienda en edificio multifamiliar </option>
                                <option value="Edificio con uso mixto vivienda y locales">Edificio con uso mixto vivienda y locales</option>
                                <option value="Hotel o similar">Hotel o similar</option>
                                <option value="Centro Comercial">Centro Comercial </option>
                                <option value="Teatro, cafeteria, restaurantes, etc.">Teatro, cafeteria, restaurantes, etc.</option>
                            </select>
                        </div>                        

                        <div class="mb-4">
                            <x-label for="nombre_estudiante" value="{{ __('Nombre del Estudiante') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="nombre_estudiante" type="text" name="nombre_estudiante" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="fecha" value="{{ __('Fecha') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="fecha" type="date" name="fecha" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <button type="button" id="get-location-btn" class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Obtener Ubicación Actual
                            </button>
                            <p id="location-info" class="text-gray-500 dark:text-gray-400 mt-2"></p>
                        </div>

                        <div class="mb-4">
                            <x-label for="latitud" value="{{ __('Latitud') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="latitud" type="text" name="latitud" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="longitud" value="{{ __('Longitud') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="longitud" type="text" name="longitud" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>
                        

                        <div class="flex items-center justify-between">
                            <x-button>
                                {{ __('Registrar Obra') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Cambiar el color del calendario a blanco */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>

    <script>
        document.getElementById('get-location-btn').addEventListener('click', function() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    document.getElementById('latitud').value = latitude;
                    document.getElementById('longitud').value = longitude;
                    document.getElementById('location-info').innerText = 'Ubicación actual: Latitud ' + latitude + ', Longitud ' + longitude;
                });
            } else {
                document.getElementById('location-info').innerText = 'Geolocalización no soportada por este navegador.';
            }
        });
    </script>
</x-app-layout>
