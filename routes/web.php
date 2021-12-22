<?php

use App\Http\Controllers\SchoolSectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{home?}', function () {
    return view('home');
})->where('home', '(inicio|index|home)')->name('home');


Route::get('/orlas-services', function() {
    return view('orlas');
})->name('orlas');

Route::get('/contacto', function() {
    return view('contact');
})->name('contact');

Route::get('/orlas/school/{schoolName}', SchoolSectionController::class)->name('orlas_school');
Route::get('/orlas/school/{schoolName}/promotion/{promotion}/id/{id}', 'App\Http\Controllers\OrlasWatcherSectionController@getOrla')->name('orlas_watcher');
Route::post('/orlas/school/{schoolName}/promotion/{promotion}/id/{id}/login', 'App\Http\Controllers\OrlasWatcherSectionController@login')->name('orlas-login');
