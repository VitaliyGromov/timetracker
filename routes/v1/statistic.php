<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\UserStatisticController;

Route::middleware('auth:sanctum')->prefix('statistic')->group(function (){
    Route::get('/{user}', [UserStatisticController::class, 'userStatistic']);
});
