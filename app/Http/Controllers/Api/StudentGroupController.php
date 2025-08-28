<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreStudentGroupRequest;
use App\Http\Requests\Api\UpdateStudentGroupCurriculumRequest;
use App\Http\Resources\Api\LectureResource;
use App\Http\Resources\Api\StudentGroupResource;
use App\Models\StudentGroup;
use App\Services\StudentGroupService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class StudentGroupController extends Controller
{
    public function __construct(
        private StudentGroupService $service
    ) {}

    public function index(): ResourceCollection
    {
        return StudentGroupResource::collection(StudentGroup::all());
    }

    public function store(StoreStudentGroupRequest $request): StudentGroupResource
    {
        return new StudentGroupResource(
            StudentGroup::create($request->validated())
        );
    }

    public function update(StoreStudentGroupRequest $request, StudentGroup $studentGroup): StudentGroupResource
    {
        $studentGroup->update($request->validated());

        return new StudentGroupResource($studentGroup);
    }

    public function destroy(StudentGroup $studentGroup): Response
    {
        $studentGroup->delete();

        return response()->noContent();
    }

    public function getCurriculum(StudentGroup $studentGroup): ResourceCollection
    {
        return LectureResource::collection(
            $studentGroup->lectures()->orderBy('position')->get()
        );
    }

    public function updateCurriculum(UpdateStudentGroupCurriculumRequest $request, StudentGroup $studentGroup): ResourceCollection
    {
        $this->service->updateCurriculum($studentGroup, $request->validated());

        return LectureResource::collection(
            $studentGroup->lectures()->orderBy('position')->get()
        );
    }
}
