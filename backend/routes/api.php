<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;


Route::post('/home/register', [UserController::class, 'register']);

Route::post('/home/login', [UserController::class, 'login']);

Route::get('/workspace', [TaskController::class, 'index']);

Route::post('/workspace/task', [TaskController::class, 'addTask']);

Route::put('/workspace/update/{id}', [TaskController::class, 'updateTask']);

Route::delete('/workspace/remove/{id}', [TaskController::class, 'deleteTask']);

Route::post('/home/forgot-password', [ResetPasswordController::class, 'sendResetPassword']);

Route::post('/home/reset-password', [ResetPasswordController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function(){

    Route::post('/home/user', [UserController::class, 'user']);

    Route::post('/home/logout', [UserController::class, 'logout']);
});
