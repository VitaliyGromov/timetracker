<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserStatisticResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticController extends Controller
{
    public function userStatistic(User $user): JsonResource
    {
        return UserStatisticResource::make($user);
    }
}
