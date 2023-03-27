<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/generate', function () {
    return view('welcome');
});

Route::prefix('/person-cards')->group(function () {
    Route::post('/', 'PersonCardController@create');

    Route::prefix('/{uuid}')->group(function () {
        Route::get('/', "PersonCardController@getByUuid");
    });
});
