<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\UserController;

Route::middleware('auth:sanctum')->prefix('users')->group(function (){
    Route::get('/',[UserController::class, 'index']);
    Route::get('/authUser', [UserController::class, 'authUser']);
    Route::get('/{user}', [UserController::class, 'show']);
});
