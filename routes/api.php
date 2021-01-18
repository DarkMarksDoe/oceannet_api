<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;


Route::get('users', [UserController::class, 'getAllUsers']);

Route::get('users/{id}', [UserController::class, 'getUser']);

Route::post('users', [UserController::class, 'createUser'])
    ->name('users.store');

Route::put('users/{id}', [UserController::class, 'updateUser'])
    ->name('users.update');

Route::delete('users/{id}', [UserController::class, 'deleteUser'])
    ->name('users.destroy');
