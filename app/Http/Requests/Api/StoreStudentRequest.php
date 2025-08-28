<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'student_group_id' => 'nullable|exists:student_groups,id',
        ];
    }
}
