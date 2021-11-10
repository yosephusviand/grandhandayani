<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [\App\Http\Controllers\API\UserController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('ronda', [\App\Http\Controllers\API\UserController::class, 'ronda']);
    Route::get('home', [\App\Http\Controllers\API\UserController::class, 'home']);
    Route::get('user/{id}', [\App\Http\Controllers\API\UserController::class, 'user']);
    Route::get('userjimpitan/{id}', [\App\Http\Controllers\API\UserController::class, 'userjimpitan']);
    Route::get('user/detail', [\App\Http\Controllers\API\UserController::class, 'details']);
    Route::post('logout', [\App\Http\Controllers\API\UserController::class, 'logout']);
    Route::post('jimpitan',[\App\Http\Controllers\API\QrcodeController::class,'store']);
    Route::post('storetoken', [\App\Http\Controllers\API\UserController::class, 'storetoken']);
});
