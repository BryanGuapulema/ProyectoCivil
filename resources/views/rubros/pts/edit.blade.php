<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Rubro pts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('rubros_pts.update', $rubro->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="nombre" name="nombre" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled>Seleccione un nombre</option>
                                <option value="Opción 1" {{ $rubro->nombre == 'Opción 1' ? 'selected' : '' }}>Opción 1</option>
                                <option value="Opción 2" {{ $rubro->nombre == 'Opción 2' ? 'selected' : '' }}>Opción 2</option>
                                <option value="Opción 3" {{ $rubro->nombre == 'Opción 3' ? 'selected' : '' }}>Opción 3</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label for="diametro" value="{{ __('diametro') }}" class="text-gray-700 dark:text-gray-300"/>
                            <select id="diametro" name="diametro" required class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled>Seleccione un diametro</option>
                                <option value="Opción 1" {{ $rubro->diametro == 'diametro 1' ? 'selected' : '' }}>diametro 1</option>
                                <option value="Opción 2" {{ $rubro->diametro == 'diametro 2' ? 'selected' : '' }}>diametro 2</option>
                                <option value="Opción 3" {{ $rubro->diametro == 'diametro 3' ? 'selected' : '' }}>diametro 3</option>
                            </select>
                        </div>                        

                        <div class="mb-4">
                            <x-label for="cantidad" value="{{ __('Cantidad (u)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="cantidad" type="number" step="0.01" value="{{ $rubro->cantidad }}" name="cantidad" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>
                       
                        <div class="mb-4">
                            <x-label for="tiempo" value="{{ __('Tiempo (h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="tiempo" type="number" step="0.01" value="{{ $rubro->tiempo }}" name="tiempo" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
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
                                    <x-input id="eo_e2" type="number" name="eo_e2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_E2 }}"/>
                                </div>
                            </div>

                            <!-- Campo EO D2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO D2') }}</button>
                                    <x-input id="eo_d2" type="number" name="eo_d2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_D2 }}"/>
                                </div>
                            </div>

                            <!-- Campo EO C2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO C2') }}</button>
                                    <x-input id="eo_c2" type="number" name="eo_c2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_C2 }}"/>
                                </div>
                            </div>

                            <!-- Campo EO C1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO C1') }}</button>
                                    <x-input id="eo_c1" type="number" name="eo_c1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_C1 }}"/>
                                </div>
                            </div>

                            <!-- Campo EO B3 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO B3') }}</button>
                                    <x-input id="eo_b3" type="number" name="eo_b3" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_B3 }}"/>
                                </div>
                            </div>

                            <!-- Campo EO B1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('EO B1') }}</button>
                                    <x-input id="eo_b1" type="number" name="eo_b1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->EO_B1 }}"/>
                                </div>
                            </div>

                            <!-- Campo Grupo I EO C1 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Grupo I EO C1') }}</button>
                                    <x-input id="grupo_i_eo_c1" type="number" name="grupo_i_eo_c1" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->GRUPO_I_EO_C1 }}"/>
                                </div>
                            </div>

                            <!-- Campo Grupo II EO C2 -->
                            <div>
                                <div class="flex items-center">
                                    <button type="button"  class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Grupo II EO C2') }}</button>
                                    <x-input id="grupo_ii_eo_c2" type="number" name="grupo_ii_eo_c2" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ $rubro->GRUPO_II_EO_C2 }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-label for="total_personas" value="{{ __('Total de Personas (H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="total_personas" type="number" step="0.01" value="{{ $rubro->total_personas }}" name="total_personas" required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="rendimiento" value="{{ __('Rendimiento (m²/h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="rendimiento" type="number" step="0.01" value="{{ $rubro->rendimiento }}" name="rendimiento" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="productividad" value="{{ __('Productividad (m²/h*H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="productividad" type="number" step="0.01" value="{{ $rubro->productividad }}" name="productividad" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="evidencia" value="{{ __('Evidencia') }}" class="text-gray-700 dark:text-gray-300"/>
                            <input type="file" id="evidencia" name="evidencia" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                            @if($rubro->evidencia)
                                <img src="{{ asset('storage/evidencias/rubrospts/' . $rubro->evidencia) }}" alt="Evidencia actual" class="mt-4 rounded-lg">
                            @endif
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-button class="ml-4">
                                {{ __('Actualizar') }}
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
            const cantidadInput = document.getElementById('cantidad');
            const tiempoInput = document.getElementById('tiempo');            
            const rendimientoInput = document.getElementById('rendimiento');
            const productividadInput = document.getElementById('productividad');            
            const totalPersonas = document.getElementById('total_personas');            
            
            
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

            // Función para calcular el rendimiento
            function calcularRendimiento() {
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const tiempo = parseFloat(tiempoInput.value) || 0;
                if (tiempo === 0) {
                    rendimientoInput.value = 0;
                } else {
                    rendimientoInput.value = (cantidad / tiempo).toFixed(2);
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

             // campos calculados cuando se modifican los campos principales            
            cantidadInput.addEventListener('input', calcularRendimiento);
            tiempoInput.addEventListener('input', calcularRendimiento);
            tiempoInput.addEventListener('input', calcularProductividad);                        
        });
    </script>
</x-app-layout>
