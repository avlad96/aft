<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecture extends Model
{
    protected $fillable = [
        'topic',
        'description',
    ];

    public function studentGroups(): BelongsToMany
    {
        return $this->belongsToMany(StudentGroup::class, 'student_group_lecture')
            ->withPivot('position')
            ->orderBy('position');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'lecture_student');
    }
}
