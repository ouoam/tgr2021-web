<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ItemController::class, 'indexHTML']);
Route::get('/lime', [ItemController::class, 'listLime']);
Route::get('/~lime', [ItemController::class, 'listNotLime']);
Route::get('/compare', [ItemController::class, 'listCompare']);
Route::get('/find', [ItemController::class, 'findHTML']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::get('login', function () {
        return view('login');
    });
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});