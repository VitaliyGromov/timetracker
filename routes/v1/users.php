<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\UserController;

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/users',[UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'authUser']);
});
