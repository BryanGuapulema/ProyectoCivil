<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Rubros KG') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($rubrosKG as $rubroKG)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="font-semibold text-lg text-gray-800 dark:text-gray-200">{{ $rubroKG->nombre }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            <img src="{{ asset('storage/evidencias/rubroskg/' . $rubroKG->evidencia) }}" alt="Evidencia" class="w-full">
                        </div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">denominacion (m): {{ $rubroKG->denominacion }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">longitud (m): {{ $rubroKG->longitud }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Cantidad (u): {{ $rubroKG->cantidad }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">kgm (m): {{ $rubroKG->kgm }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">peso (m): {{ $rubroKG->peso }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Tiempo (h): {{ $rubroKG->tiempo  }}</div>                        
                        <div class="font-semibold text-lg text-gray-800 dark:text-gray-200">Información de trabajadores</div>
                        @if($rubroKG->EO_E2  != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300"><span class="font-bold">EO E2 (u):</span> {{ $rubroKG->EO_E2  }}</div>
                        @endif
                        @if($rubroKG->EO_D2   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">EO D2 (u): {{ $rubroKG->EO_D2  }}</div>
                        @endif
                        @if($rubroKG->EO_C2   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">EO C2 (u): {{ $rubroKG->EO_C2  }}</div>
                        @endif
                        @if($rubroKG->EO_C1   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">EO C1 (u): {{ $rubroKG->EO_C1  }}</div>
                        @endif
                        @if($rubroKG->EO_B3   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">EO B3 (u): {{ $rubroKG->EO_B3  }}</div>
                        @endif
                        @if($rubroKG->EO_B1   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">EO B1 (u): {{ $rubroKG->EO_B1  }}</div>
                        @endif
                        @if($rubroKG->GRUPO_I_EO_C1   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">GRUPO I - EO C1 (u): {{ $rubroKG->GRUPO_I_EO_C1  }}</div>
                        @endif
                        @if($rubroKG->GRUPO_II_EO_C2   != 0)
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">GRUPO  II - EO C2 (u): {{ $rubroKG->GRUPO_II_EO_C2  }}</div>
                        @endif   
                        <div class="font-semibold text-lg text-gray-800 dark:text-gray-200">Métricas de Rendimiento</div>                     
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Total Personas (H): {{ $rubroKG->total_personas  }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Rendimiento (m²/h): {{ $rubroKG->rendimiento  }}</div>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Productividad (m²/h*H): {{ $rubroKG->productividad  }}</div>                        

                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('rubros_kg.edit', $rubroKG->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Editar</a>
                            <form action="{{ route('rubros_kg.destroy', $rubroKG->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
