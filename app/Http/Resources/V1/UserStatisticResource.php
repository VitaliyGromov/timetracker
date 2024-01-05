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
            'new_tasks' => $this->performedTasks()->where('status', TaskStatus::NEW)->count(),
            'in_process_tasks' => $this->performedTasks()->where('status', TaskStatus::IN_PROCESS)->count(),
            'on_test_tasks' => $this->performedTasks()->where('status', TaskStatus::ON_TESTS)->count(),
            'returned_tasks' => $this->performedTasks()->where('status', TaskStatus::RETURNED)->count(),
            'completed_tasks' => $this->performedTasks()->where('status', TaskStatus::COMPLETED)->count(),
            'authored_tasks' => $this->authoredTasks()->count(),
            'spent_time' => $this->spentTime()->get()->sum('time_spent')
        ];
    }
}
