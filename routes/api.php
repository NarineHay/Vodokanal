<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CompletedController;
use App\Http\Controllers\Api\ReplenishBalanceController;
use \App\Http\Controllers\Api\StartController;
use App\Http\Controllers\Api\StopController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'card' => CardController::class,
    'start' => StartController::class,
    'stop' => StopController::class,
    'completed' => CompletedController::class,
    'replenish-balance' => ReplenishBalanceController::class,

]);
