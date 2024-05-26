<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RubroM2;
use App\Models\Obra;


class RubroM2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rubrosM2 = RubroM2::all();
        return view('rubros.m2.index', compact('rubrosM2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Método para mostrar el formulario de creación de rubros_m2
    public function create($obra_id)
    {
        // Buscar la obra correspondiente
        $obra = Obra::findOrFail($obra_id);

        return view('rubros.m2.create', compact('obra'));
    }

    // Método para almacenar el nuevo rubro_m2 en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'nombre' => 'required|string',
            'ancho' => 'required|numeric',
            'longitud' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'area' => 'required|numeric',
            'tiempo' => 'required|numeric',
            'eo_e2' => 'required|numeric',
            'eo_d2' => 'required|numeric',
            'eo_c2' => 'required|numeric',
            'eo_c1' => 'required|numeric',
            'eo_b3' => 'required|numeric',
            'eo_b1' => 'required|numeric',
            'grupo_i_eo_c1' => 'required|numeric',
            'grupo_ii_eo_c2' => 'required|numeric',
            'total_personas' => 'required|integer',
            'rendimiento' => 'required|numeric',
            'productividad' => 'required|numeric',
            'evidencia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',            
        ]);

        // Guardar la imagen en la carpeta storage
        $imageName = time() . '.' . $request->evidencia->extension();
        $request->evidencia->storeAs('/evidencias/rubrosm2', $imageName);

        // Crear el nuevo rubro_m2 en la base de datos
        $rubro = new RubroM2();
        $rubro->obra_id = $validatedData['obra_id'];
        $rubro->nombre = $validatedData['nombre'];
        $rubro->ancho = $validatedData['ancho'];
        $rubro->longitud = $validatedData['longitud'];
        $rubro->cantidad = $validatedData['cantidad'];
        $rubro->area = $validatedData['area'];
        $rubro->tiempo = $validatedData['tiempo'];
        $rubro->eo_e2 = $validatedData['eo_e2'];
        $rubro->eo_d2 = $validatedData['eo_d2'];
        $rubro->eo_c2 = $validatedData['eo_c2'];
        $rubro->eo_c1 = $validatedData['eo_c1'];
        $rubro->eo_b3 = $validatedData['eo_b3'];
        $rubro->eo_b1 = $validatedData['eo_b1'];
        $rubro->grupo_i_eo_c1 = $validatedData['grupo_i_eo_c1'];
        $rubro->grupo_ii_eo_c2 = $validatedData['grupo_ii_eo_c2'];
        $rubro->total_personas = $validatedData['total_personas'];
        $rubro->rendimiento = $validatedData['rendimiento'];
        $rubro->productividad = $validatedData['productividad'];
        $rubro->evidencia = $imageName;        
        $rubro->save();

        return redirect()->route('obras.show', $validatedData['obra_id'])->with('success', 'Rubro m² creado correctamente');
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
