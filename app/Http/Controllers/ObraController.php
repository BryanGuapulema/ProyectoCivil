<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\User;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todas las obras de la base de datos
        $obras = Obra::all();

        // Retorna la vista con la lista de obras
        return view('obras.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener la lista de usuarios con usertype igual a 'user'
        $estudiantes = User::where('usertype', 'user')->get();
        // Pasar la lista de usuarios a la vista
        return view('obras.create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // Valida los datos del formulario
            $request->validate([
                'tipo_de_obra' => 'required',
                'nombre_de_obra' => 'required',
                'id_estudiante' => 'required',
                'fecha' => 'required|date',
                'latitud' => 'required|numeric',
                'longitud' => 'required|numeric',
            ]);
    
            // Crea una nueva obra
            $obra= Obra::create([
                'tipo_de_obra' => $request->tipo_de_obra,
                'nombre_de_obra' => $request->nombre_de_obra,
                'id_estudiante' => $request->id_estudiante,
                'fecha' => $request->fecha,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
            ]);

            // Asocia el usuario seleccionado con la obra recién creada
            $obra->users()->attach($request->input('id_estudiante'));
    
            // Redirige a el siguiente formulario de crear la obra
            return redirect()->route('obras.index')->with('success', 'Obra creada exitosamente');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $obra = Obra::findOrFail($id);
        return view('obras.show', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recuperar la obra que se va a editar
        $obra = Obra::findOrFail($id);
        
        // Obtener la lista de usuarios con usertype igual a 'user'
        $estudiantes = User::where('usertype', 'user')->get();
        
        // Pasar la obra y la lista de usuarios a la vista de edición
        return view('obras.edit', compact('obra', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'tipo_de_obra' => 'required',
            'nombre_de_obra' => 'required',
            'id_estudiante' => 'required',
            'fecha' => 'required|date',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ]);

        // Encuentra la obra a actualizar
        $obra = Obra::findOrFail($id);

        // Actualiza los datos de la obra
        $obra->tipo_de_obra = $request->tipo_de_obra;
        $obra->nombre_de_obra = $request->nombre_de_obra;
        $obra->id_estudiante = $request->id_estudiante;
        $obra->fecha = $request->fecha;
        $obra->latitud = $request->latitud;
        $obra->longitud = $request->longitud;

        // Guarda los cambios en la base de datos
        $obra->save();

        // Actualiza la relación con el usuario seleccionado
        $obra->users()->sync([$request->id_estudiante]);

        // Redirige de vuelta a la vista de index con un mensaje de éxito
        return redirect()->route('obras.index')->with('success', 'Obra actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obra = Obra::findOrFail($id);
        $obra->delete();
        return redirect()->route('obras.index')->with('success', 'Obra eliminada exitosamente');
    }
}
