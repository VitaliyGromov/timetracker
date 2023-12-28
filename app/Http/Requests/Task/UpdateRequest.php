<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'string', 'max:255', new Enum(TaskStatus::class)],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'time_spent' => ['nullable', 'date_format:H:i:s'],
        ];
    }
}
