<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\SpentTimeController;

Route::middleware('auth:sanctum')->prefix('spent_time')->group(function (){
    Route::get('/user_time_on_task', [SpentTimeController::class, 'timeSpentByUserOnTask']);
    Route::get('/task/{task}', [SpentTimeController::class, 'timeSpentOnTask']);
    Route::get('/user/{user}', [SpentTimeController::class, 'allUserTime']);
    Route::post('/', [SpentTimeController::class, 'store']);
});
