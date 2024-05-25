<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rubro;


class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rubros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados por el usuario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'ancho' => 'required|numeric',
            'longitud' => 'required|numeric',
            'cantidad' => 'required|integer',
            'area' => 'required|numeric',
            'tiempo' => 'required|numeric',
            'total_personas' => 'required|integer',
            'rendimiento' => 'required|numeric',
            'productividad' => 'required|numeric',
            'evidencia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que sea una imagen y su formato
        ]);

        // Si la validación falla, redireccionar de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Si la validación pasa, guardar el nuevo rubro

        // Subir la imagen
        $evidenciaPath = $request->file('evidencia')->store('evidencias', 'public');

        // Crear el rubro con los datos validados
        $rubro = Rubro::create([
            'nombre' => $request->input('nombre'),
            'ancho' => $request->input('ancho'),
            'longitud' => $request->input('longitud'),
            'cantidad' => $request->input('cantidad'),
            'area' => $request->input('area'),
            'tiempo' => $request->input('tiempo'),
            'total_personas' => $request->input('total_personas'),
            'rendimiento' => $request->input('rendimiento'),
            'productividad' => $request->input('productividad'),
            'evidencia' => $evidenciaPath, // Guardar la ruta de la imagen
        ]);

        // Redireccionar a la página de detalles del rubro creado
        return redirect()->back()->with('success', 'Rubro creado correctamente');

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
