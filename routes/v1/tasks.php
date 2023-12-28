<?php

use App\Http\Controllers\V1\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('tasks')->group(function (){
    Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
