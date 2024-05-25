<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Obreros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Agregar botón para agregar nuevo obrero -->
                    <a href="{{ route('obreros.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 dark:bg-gray-700">Agregar Nuevo Obrero</a>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3"></th>
                                <th class="px-6 py-3"></th> <!-- Nuevo -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($obreros as $obrero)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $obrero->categoria }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $obrero->cantidad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Agregar enlace para editar el obrero -->
                                    <a href="{{ route('obreros.edit', $obrero->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">Editar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"> <!-- Nuevo -->
                                    <!-- Agregar botón para eliminar el obrero -->
                                    <form method="POST" action="{{ route('obreros.destroy', $obrero->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
