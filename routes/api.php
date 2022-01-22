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
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('me', [MeController::class, 'me']);
    Route::get('logout', [MeController::class, 'logout']);

    Route::get('bugs', [BugController::class, 'index']);
    Route::post('bugs', [BugController::class, 'store']);
    Route::get('bugs/{bug}', [BugController::class, 'show']);
    Route::put('bugs/{bug}', [BugController::class, 'update']);
    Route::delete('bugs/{bug}', [BugController::class, 'destroy']);

    Route::get('boot-system', [BootSystemController::class, 'bootSystem']);
});
