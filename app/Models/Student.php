<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'student_group_id',
    ];

    public function studentGroup(): BelongsTo
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function lectures(): HasManyThrough
    {
        return $this->hasManyThrough(
            Lecture::class,
            StudentGroupLecture::class,
            'student_group_id',
            'id',
            'student_group_id',
            'lecture_id',
        );
    }
}
