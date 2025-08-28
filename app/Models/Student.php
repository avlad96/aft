<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function lectures(): BelongsToMany
    {
        return $this->belongsToMany(Lecture::class, 'lecture_student');
    }
}
