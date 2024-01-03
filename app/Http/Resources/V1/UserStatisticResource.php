<?php

namespace App\Http\Resources\V1;

use App\Enums\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'new_tasks' => $this->tasks()->where('status', TaskStatus::NEW)->count(),
            'in_process_tasks' => $this->tasks()->where('status', TaskStatus::IN_PROCESS)->count(),
            'on_test_tasks' => $this->tasks()->where('status', TaskStatus::ON_TESTS)->count(),
            'returned_tasks' => $this->tasks()->where('status', TaskStatus::RETURNED)->count(),
            'completed_tasks' => $this->tasks()->where('status', TaskStatus::COMPLETED)->count(),
            'time_spent' => $this->tasks()->sum('time_spent'),
        ];
    }
}
