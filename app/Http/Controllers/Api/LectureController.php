<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreLectureRequest;
use App\Http\Resources\Api\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class LectureController extends Controller
{
    public function index(): ResourceCollection
    {
        return LectureResource::collection(Lecture::all());
    }

    public function store(StoreLectureRequest $request): LectureResource
    {
        return new LectureResource(
            Lecture::create($request->validated())
        );
    }

    public function show(Lecture $lecture): LectureResource
    {
        $lecture->load('studentGroups');
        $lecture->load('students');

        return new LectureResource($lecture);
    }

    public function update(StoreLectureRequest $request, Lecture $lecture): LectureResource
    {
        $lecture->update($request->validated());

        return new LectureResource($lecture);
    }

    public function destroy(Lecture $lecture): Response
    {
        $lecture->delete();

        return response()->noContent();
    }
}
