<!-- resources/views/info/obra.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('OBRA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" value="{{ __('Nombre de la Obra') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="name" type="text" name="name" required autofocus class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="location" value="{{ __('Ubicación') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="location" type="text" name="location" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                            <p id="location-info" class="text-gray-500 dark:text-gray-400 mt-2"></p>
                            <button type="button" id="get-location-btn" class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-2">
                                Obtener Ubicación Actual
                            </button>
                        </div>

                        <div class="mb-4">
                            <x-label for="start_date" value="{{ __('Fecha de Inicio') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="start_date" type="date" name="start_date" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="end_date" value="{{ __('Fecha de Fin') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="end_date" type="date" name="end_date" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="budget" value="{{ __('Presupuesto') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="budget" type="number" name="budget" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="flex items-center justify-between">
                            <x-button>
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('get-location-btn').addEventListener('click', function() {
            // Verifica si el navegador soporta la geolocalización
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Obtén las coordenadas de la ubicación actual
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    // Actualiza el campo de ubicación con las coordenadas
                    document.getElementById('location').value = 'Latitud ' + latitude + ', Longitud ' + longitude;
                    // Actualiza el texto con la ubicación
                    document.getElementById('location-info').innerText = 'Ubicación actual: Latitud ' + latitude + ', Longitud ' + longitude;
                });
            } else {
                // Si el navegador no soporta la geolocalización
                document.getElementById('location-info').innerText = 'Geolocalización no soportada por este navegador.';
            }
        });
    </script>
</x-app-layout>
