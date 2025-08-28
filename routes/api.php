<?php

use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\StudentGroupController;
use Illuminate\Support\Facades\Route;

Route::apiResource('students', StudentController::class);

Route::apiResource('student-groups', StudentGroupController::class);
Route::get('/student-groups/{studentGroup}/curriculum', [StudentGroupController::class, 'getCurriculum']);
Route::put('/student-groups/{studentGroup}/curriculum', [StudentGroupController::class, 'updateCurriculum']);

Route::apiResource('lectures', LectureController::class);
