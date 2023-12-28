<?php

namespace App\Http\Controllers\V1;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\V1\TaskResource;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function index(Project $project): JsonResource
    {
        $tasks = Task::where('project_id', $project->id);

        return TaskResource::collection($tasks);
    }

    public function show(Task $task): JsonResource
    {
        return new TaskResource($task);
    }

    public function store(StoreRequest $request): JsonResource
    {
        $validated = $request->validated();

        $validated['status'] = TaskStatus::NEW;

        $task = Task::create($validated);

        return new TaskResource($task);
    }

    public function update(UpdateRequest $request, Task $task): JsonResource
    {
        $validated = $request->validated();

        $task->update($validated);

        return new TaskResource($task);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json();
    }
}
