<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\StatisticController;

Route::middleware('auth:sanctum')->prefix('statistic')->group(function (){
    Route::get('/{user}', [StatisticController::class, 'userStatistic']);
});
