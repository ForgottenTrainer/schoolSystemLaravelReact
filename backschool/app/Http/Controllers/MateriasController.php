<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMateriasRequest;
use App\Http\Requests\UpdateMateriasRequest;
use App\Http\Resources\MateriasResource;
use App\Models\Materias;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return MateriasResource::collection(Materias::query()
        ->orderBy('id', 'desc')
        ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateriasRequest $request)
    {
        $data = $request->validated();
        $materias = Materias::create($data);
        
        return response (new MateriasResource($materias), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Materias $materias, int $id)
    {
        $materias = $materias->where('id', $id)->first();
    
        if (! $materias) {
            return response()->json(['message' => 'La materia no existe'], 404);
        }
    
        return new MateriasResource($materias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriasRequest $request, Materias $materias, $id)
    {
        //
    // Obtener el modelo Materias
        $data = Materias::find($id);

        // Validar los datos
        $validatedData = $request->validated();

        // Actualizar el modelo con los datos validados
        $data->update($validatedData);

        return response (new MateriasResource($data), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materias $materias, $id)
    {
        $materias = Materias::find($id);
        $materias->delete();

        return response("Materia eliminada con exito", 201);
    }
}
