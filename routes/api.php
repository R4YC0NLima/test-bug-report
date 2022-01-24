<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootSystemController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('me')->group(function () {
        Route::get('', [MeController::class, 'me']);
        Route::get('logout', [MeController::class, 'logout']);
    });

    Route::prefix('users')->group(function() {
        Route::get('', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });

    Route::prefix('bugs')->group(function () {
        Route::get('', [BugController::class, 'index']);
        Route::post('', [BugController::class, 'store']);
        Route::get('/{bug}', [BugController::class, 'show']);
        Route::put('/{bug}', [BugController::class, 'update']);
        Route::delete('/{bug}', [BugController::class, 'destroy']);
    });



    Route::get('boot-system', [BootSystemController::class, 'bootSystem']);
});
