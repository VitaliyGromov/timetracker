<?php

use App\Http\Controllers\V1\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('tasks')->middleware('auth:sanctum')->group(function (){
    Route::get('/{task}', [TaskController::class, 'show']);
    Route::post('/', [TaskController::class, 'store']);
    Route::post('/{task}', [TaskController::class, 'update']);
    Route::delete('/{task}', [TaskController::class, 'destroy']);
});
