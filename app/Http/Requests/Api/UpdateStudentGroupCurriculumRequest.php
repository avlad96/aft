<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentGroupCurriculumRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lectures' => 'required|array',
            'lectures.*.id' => 'required|exists:lectures',
            'lectures.*.position' => 'required|integer|min:0',
        ];
    }
}
