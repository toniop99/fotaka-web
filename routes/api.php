<?php

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\StoreController;
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

Route::get('/check/token/{token?}', [ApiUserController::class, 'checkToken']);

Route::middleware(['api'])->group(function () {
    Route::post('/store/save/{token?}', [StoreController::class, 'save']);
    Route::get('/store/get/all/{token?}', [StoreController::class, 'getAll']);
    Route::delete('/store/delete/{token?}', [StoreController::class, 'delete']);

    Route::post('/bill/save/{token?}', [BillController::class, 'save']);
    Route::get('/bill/get/all/{token?}', [BillController::class, 'getAll']);
    Route::get('/bill/get/store/{token?}', [BillController::class, 'getByStore']);
});

Route::get('/orlas/schools', 'App\Http\Controllers\Api\OrlasController@getSchoolsLinks');
