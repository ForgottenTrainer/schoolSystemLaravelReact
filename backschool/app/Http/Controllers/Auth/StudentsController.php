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
        ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $data = $request->validated();
        $students = Students::create();

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
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students)
    {
        $data = $request->validated();
        $students->update($data);
        return new StudentsResource($students);

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
