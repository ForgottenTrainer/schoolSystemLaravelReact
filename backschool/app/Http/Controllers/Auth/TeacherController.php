<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacher;
use App\Http\Requests\UpdateTeacher;
use App\Http\Resources\TeacherResource;
use App\Models\Auth\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return TeacherResource::collection(Teacher::query()
        ->orderBy('id', 'desc')
        ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacher $request )
    {
        //
        $data = $request->validated();
        $teacher = Teacher::create($data);

        return response (new TeacherResource($teacher), 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher, int $id)
    {
        $teacher = $teacher->where('id', $id)->first();
    
        if (! $teacher) {
            return response()->json(['message' => 'The teacher does not exist.'], 404);
        }
    
        return new TeacherResource($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacher $request, Teacher $teacher, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer',
            'imagen' => 'nullable|string',
            'email' => 'required|email',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'genero' => 'nullable|string'
        ]);
        $teacher = Teacher::findOrFail($request->id); // Cambio aquí: Se asigna el resultado a $teacher
        $teacher->update($data);

        return response (new TeacherResource($teacher), 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher, string $id)
    {
        //
        $teacher = Teacher::find($id);
        $teacher->delete();
        return response("", 204);        
    }
}
