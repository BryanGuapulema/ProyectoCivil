<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;

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
        return view('obra.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                'nombre_estudiante' => 'required',
                'fecha' => 'required|date',
                'latitud' => 'required|numeric',
                'longitud' => 'required|numeric',
            ]);
    
            // Crea una nueva obra
            Obra::create([
                'tipo_de_obra' => $request->tipo_de_obra,
                'nombre_de_obra' => $request->nombre_de_obra,
                'nombre_estudiante' => $request->nombre_estudiante,
                'fecha' => $request->fecha,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
            ]);
    
            // Redirige a el siguiente formulario de crear la obra
            return redirect()->route('obras.index')->with('success', 'Obra creada exitosamente');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
