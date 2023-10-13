<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Http\Resources\StudentsResource;
use App\Models\Students;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        //
        return StudentsResource::collection(Students::query()
        ->orderBy('id', 'desc')
        ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $data = $request->validated();
        $students = Students::create($data);

        return response (new StudentsResource($students), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, int $id)
    {
        $student = $students->where('id', $id)->first();
    
        if (! $student) {
            return response()->json(['message' => 'The student does not exist.'], 404);
        }
    
        return new StudentsResource($student);
    }
    
    public function update(UpdateStudentsRequest $request, Students $students, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer',
            'carrera' => 'required',
            'imagen' => 'nullable|string',
            'email' => 'required|email',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'cuatrimestre' => 'nullable|string',
            'genero' => 'nullable|string'
        ]);
        $student = Students::findOrFail($request->id); // Cambio aquí: Se asigna el resultado a $student
        $student->update($data);

        return response (new StudentsResource($students), 201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students, $id)
    {
        $students = Students::find($id);
        $students->delete();
        return response("", 204);
    }
}
