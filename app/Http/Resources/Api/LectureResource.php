<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'topic' => $this->topic,
            'description' => $this->description,
            'position' => $this->whenPivotLoaded('student_group_lecture', fn() => $this->pivot->position),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
