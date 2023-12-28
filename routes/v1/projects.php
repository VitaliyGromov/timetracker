<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ProjectController;

Route::prefix('projects')->group(function (){
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/{project}/tasks', [ProjectController::class, 'tasks'])->name('projects.tasks');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::post('/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});
