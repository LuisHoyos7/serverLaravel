<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\AuthController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login',    [AuthController::class, 'login']);
    Route::post('logout',   [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',       [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    
});


Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::get('/user_apis' ,           [UserApiController::class, 'index']);
    Route::post('/user_apis/store' ,    [UserApiController::class, 'store']);
    Route::delete('/user_apis/delete/{userApi}' ,   [UserApiController::class, 'destroy']);
    Route::put('/user_apis/update/{userApi}' ,      [UserApiController::class, 'update']);
});
