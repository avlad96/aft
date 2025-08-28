<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'student_group_id' => $this->student_group_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lectures' => LectureResource::collection($this->whenLoaded('lectures'))
        ];
    }
}
