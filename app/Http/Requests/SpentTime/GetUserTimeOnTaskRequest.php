<?php

namespace App\Http\Requests\SpentTime;

use Illuminate\Foundation\Http\FormRequest;

class GetUserTimeOnTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
        ];
    }
}
