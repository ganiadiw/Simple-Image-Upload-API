<?php

use App\Http\Controllers\ImageController;
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

Route::get('/images', [ImageController::class, 'index']);
Route::group(['prefix' => 'image'], function () {
    Route::post('/', [ImageController::class, 'create']);
    Route::get('/{id}', [ImageController::class, 'show']);
    Route::put('/{id}', [ImageController::class, 'update']);
    Route::delete('/{id}', [ImageController::class, 'destroy']);
});
