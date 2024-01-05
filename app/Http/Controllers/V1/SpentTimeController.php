<?php

namespace App\Http\Controllers\V1;

use App\Actions\SpentTIme\CalculateSpentTimeOnTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpentTime\GetUserTimeOnTaskRequest;
use App\Http\Requests\SpentTime\StoreRequest;
use App\Models\SpentTime;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Response;

class SpentTimeController extends Controller
{
    public function store(StoreRequest $request): Response
    {
        $validated =  $request->validated();

        SpentTime::create($validated);

        return response()->noContent();
    }

    public function timeSpentByUserOnTask(GetUserTimeOnTaskRequest $request): string
    {
        $validated = $request->validated();

        $task = Task::find($validated['task_id']);

        return $task->spentTimeByUser($validated['user_id'])->get()->sum('time_spent');
    }

    public function timeSpentOnTask(Task $task): string
    {
        return $task->spentTimes()->get()->sum('time_spent');
    }

    public function allUserTime(User $user): string
    {
        return $user->spentTime()->get()->sum('time_spent');
    }
}
