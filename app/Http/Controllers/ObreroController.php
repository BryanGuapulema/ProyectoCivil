<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obrero;

class ObreroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obreros = Obrero::all();
        return view('obreros.index', compact('obreros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obreros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
    $request->validate([
        'categoria.*' => 'required|string|max:255',
        'cantidad.*' => 'required|integer|min:1',
    ]);

    // Obtener los datos de categoría y cantidad del formulario
    $categorias = $request->input('categoria');
    $cantidades = $request->input('cantidad');

    // Iterar sobre los datos y guardar cada obrero en la base de datos
    foreach ($categorias as $key => $categoria) {
        $obrero = new Obrero();
        $obrero->categoria = $categoria;
        $obrero->cantidad = $cantidades[$key];
        $obrero->save();
    }

    // Redirigir a la vista de la lista de obreros con un mensaje de éxito
    return redirect()->route('obreros.index')->with('success', 'Obreros creados exitosamente');
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
    public function edit(Obrero $obrero)
    {
        return view('obreros.edit', compact('obrero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obrero $obrero)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'categoria' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Actualizar el obrero con los nuevos datos
        $obrero->categoria = $request->input('categoria');
        $obrero->cantidad = $request->input('cantidad');
        $obrero->save();

        // Redirigir a la vista de la lista de obreros con un mensaje de éxito
        return redirect()->route('obreros.index')->with('success', 'Obrero actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Método para eliminar obreros
    public function destroy(Obrero $obrero)
    {
        // Eliminar el obrero
        $obrero->delete();

        // Redirigir a la vista de la lista de obreros con un mensaje de éxito
        return redirect()->route('obreros.index')->with('success', 'Obrero eliminado exitosamente');
    }
}
