<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Rubro m²') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('rubros_m2.store') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="nombre" name="nombre" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Seleccione un nombre</option>
                                <option value="Opción 1">Opción 1</option>
                                <option value="Opción 2">Opción 2</option>
                                <option value="Opción 3">Opción 3</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label for="ancho" value="{{ __('Ancho (m)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="ancho" type="number" step="0.01" name="ancho" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="longitud" value="{{ __('Longitud (m)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="longitud" type="number" step="0.01" name="longitud" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="cantidad" value="{{ __('Cantidad (u)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="cantidad" type="number" step="0.01" name="cantidad" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="area" value="{{ __('Área (m²)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="area" type="number" step="0.01" name="area" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="tiempo" value="{{ __('Tiempo (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="tiempo" type="number" step="0.01" name="tiempo" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>                                                                


                        <div class="mb-4">
                            <x-label for="total_personas" value="{{ __('Total de personas (H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="total_personas" type="number" step="1" name="total_personas"  required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="rendimiento" value="{{ __('Rendimiento (m²/h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="rendimiento" type="number" step="0.01" name="rendimiento"  required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="productividad" value="{{ __('Productividad (m²/h*H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="productividad" type="number" step="0.01" name="productividad"  required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="evidencia" value="{{ __('Evidencia (imagen)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <input id="evidencia" type="file" name="evidencia" accept="image/*" required class="mt-1 block w-full text-gray-700 dark:text-gray-300 dark:bg-gray-900"/>
                        </div>

                        <input type="hidden" name="obra_id" value="{{ $obra->id }}">

                        <div class="flex items-center justify-between">
                            <x-button>
                                {{ __('Guardar Rubro') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
