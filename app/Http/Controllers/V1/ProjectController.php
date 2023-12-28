<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Http\Resources\V1\ProjectResource;
use App\Http\Resources\V1\TaskResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function index(): JsonResource
    {
        $projects = Project::paginate(15);

        return ProjectResource::collection($projects);
    }

    public function tasks(Project $project): JsonResource
    {
        return TaskResource::collection($project->tasks);
    }

    public function show(Project $project): JsonResource
    {
        return new ProjectResource($project);
    }

    public function store(StoreRequest $request): JsonResource
    {
        $validated = $request->validated();

        $project = Project::create($validated);

        return new ProjectResource($project);
    }

    public function update(UpdateRequest $request, Project $project): JsonResource
    {
        $validated = $request->validated();

        $project->update($validated);

        return new ProjectResource($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json();
    }
}
