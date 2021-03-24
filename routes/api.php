<?php


use Illuminate\Support\Facades\Route;


/** Token free paths */
Route::prefix('v1')->group(function () {

    Route::post('/register', ["\App\Http\Controllers\Api\Auth\RegisterController", "register"]);
    Route::post('/login', ["\App\Http\Controllers\Api\Auth\LoginController", "login"]);

});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {

    Route::get('/getUser', ["\App\Http\Controllers\Api\User\UserController", "getUser"]);
    Route::post('/meditation/end', ["\App\Http\Controllers\Api\Meditation\MeditationLogController", "endMeditation"]);
    Route::get('/user/meditation/logs', ["\App\Http\Controllers\Api\Meditation\MeditationLogController", "getMeditationLogs"]);
    Route::get('/user/meditation/statistics', ["\App\Http\Controllers\Api\Meditation\MeditationLogController", "getMeditationStatistics"]);

});
