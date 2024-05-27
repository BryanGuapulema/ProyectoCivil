<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RubroM2;
use App\Models\Obra;
use Illuminate\Support\Facades\Storage;


class RubroM2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {        
        $obra_id = $request->input('obra_id');
        // Filtrar los rubros por el ID de la obra
        $rubrosM2 = RubroM2::where('obra_id', $obra_id)->get();

        //$rubrosM2 = RubroM2::all();
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
        $rubro = RubroM2::findOrFail($id);
        $obra = Obra::findOrFail($rubro->obra_id);

        return view('rubros.m2.edit', compact('rubro', 'obra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'ancho' => 'required|numeric',
            'longitud' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'area' => 'required|numeric',
            'tiempo' => 'required|numeric',
            'total_personas' => 'required|integer',
            'rendimiento' => 'required|numeric',
            'productividad' => 'required|numeric',
            'evidencia' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'eo_e2' => 'nullable|integer',
            'eo_d2' => 'nullable|integer',
            'eo_c2' => 'nullable|integer',
            'eo_c1' => 'nullable|integer',
            'eo_b3' => 'nullable|integer',
            'eo_b1' => 'nullable|integer',
            'grupo_i_eo_c1' => 'nullable|integer',
            'grupo_ii_eo_c2' => 'nullable|integer',
        ]);

        $rubro = RubroM2::findOrFail($id);

        // Verificar si se ha subido una nueva imagen
        if ($request->hasFile('evidencia')) {
            $imageName = time() . '.' . $request->evidencia->extension();
            $request->evidencia->storeAs('evidencias/rubrosm2', $imageName, 'public'); // Asegurar que se guarda en 'public' disk
            $validatedData['evidencia'] = $imageName;
        }

        // Actualizar el rubro_m2 en la base de datos con los datos validados
        $rubro->update($validatedData);

        return redirect()->route('rubros_m2.index')->with('success', 'Rubro m² actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el rubro_m2 por ID
        $rubro = RubroM2::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($rubro->evidencia) {
            Storage::disk('public')->delete('evidencias/rubrosm2/' . $rubro->evidencia);
        }

        // Eliminar el rubro_m2 de la base de datos
        $rubro->delete();

        // Redirigir a la vista de la lista de rubros_m2 con un mensaje de éxito
        return redirect()->route('rubros_m2.index')->with('success', 'Rubro m² eliminado correctamente');
    }
}
