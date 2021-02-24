<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{name}', [UserController::class, 'byName']);


Route::get('/kind', [ItemController::class, 'kind']);
Route::get('/items', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'push']);
Route::get('/items/{name}', [ItemController::class, 'byName']);
Route::get('/find', [ItemController::class, 'find']);

Route::post('/rpi', [ItemController::class, 'rpi']);