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

Route::post('jimpitan/{id}',[\App\Http\Controllers\API\QrcodeController::class,'store']);

Route::post('login', [\App\Http\Controllers\API\UserController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user/detail', [\App\Http\Controllers\API\UserController::class, 'details']);
    Route::post('logout', [\App\Http\Controllers\API\UserController::class, 'logout']);
});
