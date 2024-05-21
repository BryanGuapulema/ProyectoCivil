<!-- resources/views/obras/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Obras') }}
        </h2>
    </x-slot>

    

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('obras.create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                    {{ __('Registrar Nueva Obra') }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">                    
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif                    
                                        
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($obras as $obra)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 flex flex-col justify-between">
                                <div class="mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                        <a href="{{ route('obras.show', $obra->id) }}">
                                            {{ $obra->nombre_de_obra }}
                                        </a>
                                        
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2"><strong>Tipo de Obra:</strong> {{ $obra->tipo_de_obra }}</p>                                    
                                    <p class="text-gray-600 dark:text-gray-300 mb-2"><strong>Nombre Estudiante:</strong>                        
                                        @foreach ($obra->users as $user)
                                            {{ $user->name }}
                                        @endforeach
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2"><strong>Fecha:</strong> {{ $obra->fecha }}</p>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2"><strong>Latitud:</strong> {{ $obra->latitud }}</p>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2"><strong>Longitud:</strong> {{ $obra->longitud }}</p>
                                    <a href="{{ route('obras.edit', $obra->id) }}" class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</a>

                                    
                                    <form action="{{ route('obras.destroy', $obra->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta obra?')" class="bg-red-500 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
                                    </form>


                                </div>
                                <div class="flex justify-between items-center">
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $obra->latitud }},{{ $obra->longitud }}" target="_blank" class="text-gray-600 dark:text-gray-300">
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                                            Ir a la ubicación
                                        </button>
                                    </a>
                                    <a href="{{ route('obras.show', $obra->id) }}" class="text-gray-600 dark:text-gray-300">
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                                            Ver información
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
