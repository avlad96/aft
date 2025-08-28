<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentGroupLecture extends Pivot
{
    protected $table = 'student_group_lecture';

    protected $fillable = [
        'student_group_id',
        'lecture_id',
        'position',
    ];
}
