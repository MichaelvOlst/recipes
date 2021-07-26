<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\MeController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);


Route::prefix('/auth')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', MeController::class);
});
