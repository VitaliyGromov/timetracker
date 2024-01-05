<?php

namespace App\Http\Resources\V1;

use App\Actions\CalculateSpentTimeOnProject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'user' => UserResource::make($this->user),
            'time_spent' => CalculateSpentTimeOnProject::handle($this->tasks)
        ];
    }
}
