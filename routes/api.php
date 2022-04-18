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


Route::post('v2/login', [\App\Http\Controllers\API\UserController::class, 'login']);
Route::post('v3/login', [\App\Http\Controllers\API\UserController::class, 'login']);
// Route::post('login-update', [\App\Http\Controllers\API\UserController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('v2/ronda', [\App\Http\Controllers\API\UserController::class, 'ronda']);
    Route::get('v2/home', [\App\Http\Controllers\API\UserController::class, 'home']);
    Route::get('v2/user/{id}', [\App\Http\Controllers\API\UserController::class, 'user']);
    Route::get('v2/user/detail', [\App\Http\Controllers\API\UserController::class, 'details']);
    Route::get('v2/userjimpitan/{id}', [\App\Http\Controllers\API\UserController::class, 'userjimpitan']);
    Route::get('v2/userriwayat/{id}', [App\Http\Controllers\API\UserController::class, 'riwayatjimpit']);
    Route::post('v2/logout', [\App\Http\Controllers\API\UserController::class, 'logout']);
    Route::post('v2/jimpitan',[\App\Http\Controllers\API\QrcodeController::class,'store']);
    Route::post('v2/storetoken', [\App\Http\Controllers\API\UserController::class, 'storetoken']);

    Route::get('v3/ronda', [\App\Http\Controllers\API\UserController::class, 'ronda']);
    Route::get('v3/home', [\App\Http\Controllers\API\UserController::class, 'home']);
    Route::get('v3/user/{id}', [\App\Http\Controllers\API\UserController::class, 'user']);
    Route::get('v3/user/detail', [\App\Http\Controllers\API\UserController::class, 'details']);
    Route::get('v3/userjimpitan/{id}', [\App\Http\Controllers\API\UserController::class, 'userjimpitan']);
    Route::get('v3/userriwayat/{id}', [App\Http\Controllers\API\UserController::class, 'riwayatjimpit']);
    Route::post('v3/logout', [\App\Http\Controllers\API\UserController::class, 'logout']);
    Route::post('v3/jimpitan',[\App\Http\Controllers\API\QrcodeController::class,'store']);
    Route::post('v3/storetoken', [\App\Http\Controllers\API\UserController::class, 'storetoken']);
    
    // Route::get('ronda-update', [\App\Http\Controllers\API\UserController::class, 'ronda']);
    // Route::get('home-update', [\App\Http\Controllers\API\UserController::class, 'home']);
    // Route::get('user-update/{id}', [\App\Http\Controllers\API\UserController::class, 'user']);
    // Route::get('userriwayat/{id}', [App\Http\Controllers\API\UserController::class, 'riwayatjimpit']);
    // Route::get('userjimpitan-update/{id}', [\App\Http\Controllers\API\UserController::class, 'userjimpitan']);
    // Route::get('user-update/detail', [\App\Http\Controllers\API\UserController::class, 'details']);
    // Route::post('logout-update', [\App\Http\Controllers\API\UserController::class, 'logout']);
    // Route::post('jimpitan-update',[\App\Http\Controllers\API\QrcodeController::class,'store']);
    // Route::post('storetoken-update', [\App\Http\Controllers\API\UserController::class, 'storetoken']);
});
