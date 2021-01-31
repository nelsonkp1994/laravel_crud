<?php

use App\Http\Controllers\UsersController;
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

Route::post('/users', [UsersController::class, 'index']);

Route::post('/user/add', [UsersController::class, 'store']);

Route::post('/user/info', [UsersController::class, 'show']);

Route::post('/user/update', [UsersController::class, 'update']);

Route::post('/user/delete', [UsersController::class, 'destroy']);