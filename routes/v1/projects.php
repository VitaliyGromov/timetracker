<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ProjectController;

Route::prefix('projects')->middleware('auth:sanctum')->group(function (){
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/{project}', [ProjectController::class, 'show']);
    Route::get('/{project}/tasks', [ProjectController::class, 'tasks']);
    Route::post('/', [ProjectController::class, 'store']);
    Route::post('/{project}', [ProjectController::class, 'update']);
    Route::delete('/{project}', [ProjectController::class, 'destroy']);
});
