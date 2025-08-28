<?php

namespace App\Services;

use App\Models\StudentGroup;

class StudentGroupService
{
    public function updateCurriculum(StudentGroup $studentGroup, array $data): void
    {
        $lecturesData = [];

        foreach ($data['lectures'] as $lecture) {
            $lecturesData[$lecture['id']] = ['position' => $lecture['position']];
        }

        $studentGroup->lectures()->sync($lecturesData);
    }
}
