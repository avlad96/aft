<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreStudentRequest;
use App\Http\Requests\Api\UpdateStudentRequest;
use App\Http\Resources\Api\StudentResource;
use App\Models\Student;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function index(): ResourceCollection
    {
        return StudentResource::collection(Student::all());
    }

    public function store(StoreStudentRequest $request): StudentResource
    {
        return new StudentResource(
            Student::create($request->validated())
        );
    }

    public function show(Student $student): StudentResource
    {
        $student->load('lectures');

        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, Student $student): StudentResource
    {
        $student->update($request->validated());

        return new StudentResource($student);
    }

    public function destroy(Student $student): Response
    {
        $student->delete();

        return response()->noContent();
    }
}
