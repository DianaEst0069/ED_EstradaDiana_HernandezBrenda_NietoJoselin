<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mascota;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener los datos del modelo
        $mascotas = Mascota::all();

        //Mandamos la información a la vista del index
        return view('mascotas.index',compact('mascotas'));
    }

    /**
     * Retornar la vista del formulario
     */
    public function create()
    {
        //
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Esquema para enviar datos a la BD
        Mascota::create([
            'nombre' => $request->nombre,
            'raza' => $request->raza,
            'color' => $request->color, 
            'edad' => $request->edad, 
            'estado' => $request->estado,
        ]);

        //Enviar al usuario a otra página
        return redirect()->route('mascotas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Consultar información
     */
    public function edit(Mascota $mascota)
    {
        //Retornar vista con los datos 
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        //Realizar validaciones de los campos del formulario
        $request ->validate([
            'nombre' => 'required', 
            'raza' => 'required',
            'color' => 'required',
            'edad' => 'required',
            'estado' => 'required',

        ]);

        $mascota->update($request->all());

        return redirect() -> route('mascotas.index')
        ->with('success', 'Actualización con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //Eliminación del registro
        $mascota -> delete();

        //Redireccionar al usuario
        return redirect() -> route('mascotas.index')
        -> with('success', 'Mascota eliminada');
    }
    
}
