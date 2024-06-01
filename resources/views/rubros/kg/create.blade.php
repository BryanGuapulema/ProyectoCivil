<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Rubro kg') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('rubros_kg.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="nombre" name="nombre" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Seleccione un nombre</option>
                                <option value="Acero longitudinal en columnas">Acero longitudinal en columnas</option>
                                <option value="Acero longitudinal en vigas">Acero longitudinal en vigas</option>
                                <option value="Acero transversal en columnas">Acero transversal en columnas</option>
                                <option value="Acero transversal en vigas">Acero transversal en vigas</option>
                                <option value="Acero de refuerzo en losa">Acero de refuerzo en losa</option>
                                <option value="Acero estructural en columna">Acero estructural en columna</option>
                                <option value="Acero estructural en viga">Acero estructural en viga</option>                                
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label for="denominacion" value="{{ __('Denominación') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="denominacion" name="denominacion" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Seleccione una denominación</option>
                                <option value="Vr ⌀ 8">Vr ⌀ 8</option>
                                <option value="Vr ⌀ 10">Vr ⌀ 10</option>
                                <option value="Vr ⌀ 12">Vr ⌀ 12</option>
                                <option value="Vr ⌀ 14">Vr ⌀ 14</option>
                                <option value="Vr ⌀ 16">Vr ⌀ 16</option>
                                <option value="Vr ⌀ 18">Vr ⌀ 18</option>
                                <option value="Vr ⌀ 20">Vr ⌀ 20</option>
                                <option value="Vr ⌀ 22">Vr ⌀ 22</option>
                                <option value="HEB 240">HEB 240</option>
                                <option value="HEB 280">HEB 280</option>
                                <option value="HEB 300">HEB 300</option>
                                <option value="TC150x150x3">TC150x150x3</option>
                                <option value="TC150x150x4">TC150x150x4</option>
                                <option value="TC150x150x5">TC150x150x5</option>
                                <option value="TC200x200x3">TC200x200x3</option>
                                <option value="TC200x200x4">TC200x200x4</option>
                                <option value="TC200x200x5">TC200x200x5</option>
                                <option value="TC300x300x3">TC300x300x3</option>
                                <option value="TC300x300x4">TC300x300x4</option>
                                <option value="TC300x300x5">TC300x300x5</option>
                                <option value="TR150x100x3">TR150x100x3</option>
                                <option value="TR150x100x4">TR150x100x4</option>
                                <option value="TR200x100x4">TR200x100x4</option>
                                <option value="TR250x150x5">TR250x150x5</option>
                                <option value="TR300x200x5">TR300x200x5</option>
                                <option value="2C200x100x6">2C200x100x6</option>
                                <option value="2C250x100x6">2C250x100x6</option>
                                <option value="2C300x100x6">2C300x100x6</option>
                                <option value="2C300x150x10">2C300x150x10</option>
                                <option value="IPE 120">IPE 120</option>
                                <option value="IPE 140">IPE 140</option>
                                <option value="IPE 180">IPE 180</option>
                                <option value="IPE 200">IPE 200</option>
                                <option value="IPE 220">IPE 220</option>
                                <option value="IPE 240">IPE 240</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label for="longitud" value="{{ __('longitud (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="longitud" type="number" step="0.01" value="0" name="longitud" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="cantidad" value="{{ __('Cantidad (u)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="cantidad" type="number" step="1" value="0" name="cantidad" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div> 

                        <div class="mb-4">
                            <x-label for="kgm" value="{{ __('kgm (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="kgm" type="number" step="0.01" value="0" name="kgm" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>
                        
                        <div class="mb-4">
                            <x-label for="peso" value="{{ __('peso (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="peso" type="number" step="0.01" value="0" name="peso" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>
                        
                                               

                        <div class="mb-4">
                            <x-label for="tiempo" value="{{ __('Tiempo (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="tiempo" type="number" step="0.01" value="0" name="tiempo" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="font-semibold text-lg text-gray-700 dark:text-gray-300">
                                {{ __('Información de obreros') }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Presione el botón para agregar cantidad de personas por categoría') }}
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <!-- Campo EO E2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO E2') }}</button>
                                    <x-input id="eo_e2" type="number" name="eo_e2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo EO D2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO D2') }}</button>
                                    <x-input id="eo_d2" type="number" name="eo_d2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo EO C2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO C2') }}</button>
                                    <x-input id="eo_c2" type="number" name="eo_c2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo EO C1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO C1') }}</button>
                                    <x-input id="eo_c1" type="number" name="eo_c1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo EO B3 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO B3') }}</button>
                                    <x-input id="eo_b3" type="number" name="eo_b3" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo EO B1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO B1') }}</button>
                                    <x-input id="eo_b1" type="number" name="eo_b1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo GRUPO I: EO C1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('GRUPO I: EO C1') }}</button>
                                    <x-input id="grupo_i_eo_c1" type="number" name="grupo_i_eo_c1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>

                            <!-- Campo GRUPO II: EO C2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('GRUPO II: EO C2') }}</button>
                                    <x-input id="grupo_ii_eo_c2" type="number" name="grupo_ii_eo_c2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="0"/>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-label for="total_personas" value="{{ __('Total de personas (H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="total_personas" type="number" step="1" name="total_personas" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="rendimiento" value="{{ __('Rendimiento (m²/h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="rendimiento" type="number" step="0.01" name="rendimiento" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="productividad" value="{{ __('Productividad (m²/h*H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="productividad" type="number" step="0.01" name="productividad" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const camposObreros = document.querySelectorAll('[name^="eo_"], #grupo_i_eo_c1, #grupo_ii_eo_c2');            
            const longitudInput = document.getElementById('longitud');
            const cantidadInput = document.getElementById('cantidad');
            const kgmInput = document.getElementById('kgm');
            const pesoInput = document.getElementById('peso');
            const tiempoInput = document.getElementById('tiempo');            
            const rendimientoInput = document.getElementById('rendimiento');
            const productividadInput = document.getElementById('productividad');            
            const totalPersonas = document.getElementById('total_personas');            
            
            // Definir valores específicos de kgm para cada denominación
            const kgmValues = {
                'Vr ⌀ 8': 0.395,
                'Vr ⌀ 10': 0.617,
                'Vr ⌀ 12': 0.888,
                'Vr ⌀ 14': 1.208,
                'Vr ⌀ 16': 1.578,
                'Vr ⌀ 18': 1.998,
                'Vr ⌀ 20': 2.466,
                'Vr ⌀ 22': 2.984,
                'HEB 240': 83.2,
                'HEB 280': 103,
                'HEB 300': 117,
                'TC150x150x3': 13.67,
                'TC150x150x4': 18.01,
                'TC150x150x5': 22.26,
                'TC200x200x3': 18.38,
                'TC200x200x4': 24.29,
                'TC200x200x5': 30.11,
                'TC300x300x3': 27.8,
                'TC300x300x4': 36.85,
                'TC300x300x5': 45.81,
                'TR150x100x3': 11.31,
                'TR150x100x4': 14.87,
                'TR200x100x4': 18.01,
                'TR250x150x5': 30.11,
                'TR300x200x5': 37.96,
                '2C200x100x6': 35.58,
                '2C250x100x6': 40.28,
                '2C300x100x6': 45,
                '2C300x150x10': 88.36,
                'IPE 120': 10.4,
                'IPE 140': 12.9,
                'IPE 180': 18.8,
                'IPE 200': 22.4,
                'IPE 220': 26.2,
                'IPE 240': 30.7,
            };

            // Función para actualizar el campo kgm basado en la denominación seleccionada
            function actualizarKgm() {
                const denominacion = document.getElementById('denominacion').value;
                kgmInput.value = kgmValues[denominacion] || 0;
                calcularPeso();
            }

            // Escuchar cambios en el campo de selección denominación
            document.getElementById('denominacion').addEventListener('change', actualizarKgm);

            // Función para calcular el total de personas
            function calcularTotalPersonas() {
                let total = 0;
                camposObreros.forEach(function(campo) {
                    total += parseInt(campo.value) || 0;
                });
                totalPersonas.value = total;
                calcularProductividad();
            }

            // Calcular el total de personas cuando cambie el valor de los campos de categorías de obreros
            camposObreros.forEach(function(campo) {
                campo.addEventListener('input', calcularTotalPersonas);
            });

            // Función para calcular el peso
            function calcularPeso() {
                const longitud = parseFloat(longitudInput.value) || 0;
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const kgm = parseFloat(kgmInput.value) || 0;
                const peso =  longitud * cantidad * kgm;
                pesoInput.value = peso.toFixed(2);
                calcularRendimiento();                                
            }

            // Función para calcular el rendimiento
            function calcularRendimiento() {
                const peso = parseFloat(pesoInput.value) || 0;
                const tiempo = parseFloat(tiempoInput.value) || 0;
                if (tiempo === 0) {
                    rendimientoInput.value = 0;
                } else {
                    rendimientoInput.value = (peso / tiempo).toFixed(2);
                }
                calcularProductividad();
            }

            // Función para calcular la productividad
            function calcularProductividad() {                
                const rendimiento = parseFloat(rendimientoInput.value) || 0;
                const tPersonas = parseFloat(totalPersonas.value) || 0;
                
                if (tPersonas === 0) {
                    productividadInput.value = 0;
                } else {
                    productividadInput.value = (rendimiento / tPersonas).toFixed(2);
                }
            }

            // Calcular los valores iniciales
            actualizarKgm();
            calcularTotalPersonas();
            calcularPeso();
            calcularRendimiento();
            calcularProductividad();

            // Campos calculados cuando se modifican los campos principales            
            longitudInput.addEventListener('input', calcularPeso);
            cantidadInput.addEventListener('input', calcularPeso);
            kgmInput.addEventListener('input', calcularPeso);
            tiempoInput.addEventListener('input', calcularRendimiento);                                   
        });
    </script>
    
</x-app-layout>
