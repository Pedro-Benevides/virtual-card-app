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

Route::get('/generate', \App\Http\Livewire\QrCodeGenerate::class)->name('home');

Route::get('/gen-code/{cardUuid}', "\App\Http\Controllers\PersonCardController@genCode")->name('gen-code');

Route::prefix('/person-cards/{cardUuid}')->group(function () {
    Route::get('/qr-code', \App\Http\Livewire\QrCode::class);
    Route::get('/', \App\Http\Livewire\VirtualCard::class);
});
