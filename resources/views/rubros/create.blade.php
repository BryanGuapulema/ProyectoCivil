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
                    <form method="POST" action="#" enctype="multipart/form-data">
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
                            <table id="category-table" class="min-w-full bg-white dark:bg-gray-800">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                        <th class="px-4 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="categoria[]" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300">
                                                <option value="" disabled selected>Seleccione una categoría</option>
                                                <option value="Categoría 1">Categoría 1</option>
                                                <option value="Categoría 2">Categoría 2</option>
                                                <option value="Categoría 3">Categoría 3</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" name="cantidad[]" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                                        </td>
                                        <td>
                                            <button type="button" class="text-red-500 dark:text-red-300" onclick="removeRow(this)">Eliminar</button>
                                        </td>
                                    </tr>
                                    <!-- Aquí se agregarán las filas dinámicamente -->
                                </tbody>
                            </table>
                        </div>

                        <div class="mb-4">
                            <x-button type="button" id="add-category-btn">
                                {{ __('Añadir Categoría') }}
                            </x-button>
                        </div>

                        <div class="mb-4">
                            <x-label for="total_personas" value="{{ __('Total de personas (H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="total_personas" type="number" step="1" name="total_personas" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="rendimiento" value="{{ __('Rendimiento (m²/h)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="rendimiento" type="number" step="0.01" name="rendimiento" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="productividad" value="{{ __('Productividad (m²/h*H)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <x-input id="productividad" type="number" step="0.01" name="productividad" readonly required class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300"/>
                        </div>

                        <div class="mb-4">
                            <x-label for="evidencia" value="{{ __('Evidencia (imagen)') }}" class="text-gray-700 dark:text-gray-300"/>
                            <input id="evidencia" type="file" name="evidencia" accept="image/*" required class="mt-1 block w-full text-gray-700 dark:text-gray-300 dark:bg-gray-900"/>
                        </div>

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
        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        document.getElementById('add-category-btn').addEventListener('click', function() {
            var tableBody = document.querySelector('#category-table tbody');
            var newRow = document.createElement('tr');

            var categoryCell = document.createElement('td');
            var categorySelect = document.createElement('select');
            categorySelect.setAttribute('name', 'categoria[]');
            categorySelect.setAttribute('class', 'mt-1 block w-full dark:bg-gray-900 dark:text-gray-300');
            categorySelect.innerHTML = `
                <option value="" disabled selected>Seleccione una categoría</option>
                <option value="Categoría 1">Categoría 1</option>
                <option value="Categoría 2">Categoría 2</option>
                <option value="Categoría 3">Categoría 3</option>
            `;
            categoryCell.appendChild(categorySelect);
            newRow.appendChild(categoryCell);

            var quantityCell = document.createElement('td');
            var quantityInput = document.createElement('input');
            quantityInput.setAttribute('type', 'number');
            quantityInput.setAttribute('step', '0.01');
            quantityInput.setAttribute('name', 'cantidad[]');
            quantityInput.setAttribute('class', 'mt-1 block w-full dark:bg-gray-900 dark:text-gray-300');
            quantityCell.appendChild(quantityInput);
            newRow.appendChild(quantityCell);

            var removeCell = document.createElement('td');
            var removeButton = document.createElement('button');
            removeButton.setAttribute('type', 'button');
            removeButton.setAttribute('class', 'text-red-500 dark:text-red-300');
            removeButton.textContent = 'Eliminar';
            removeButton.addEventListener('click', function() {
                tableBody.removeChild(newRow);
            });
            removeCell.appendChild(removeButton);
            newRow.appendChild(removeCell);

            tableBody.appendChild(newRow);
        });
    </script>
</x-app-layout>
