<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            StudentGroupLecture::class,
            'lecture_id',
            'student_group_id',
            'id',
            'student_group_id',
        );
    }
}
